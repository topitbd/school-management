<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentClassController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->query('name');
        $level_two = $request->query('level_two');

        $level = $level_two ? 3 : ($name ? 2 : 1);

        $classes = StudentClass::query()
            ->when($level === 1, function ($query) {
                $query->whereNull('level_two')->whereNull('level_three');
            })
            ->when($level === 2, function ($query) use ($name) {
                $query->where('name', $name)->whereNull('level_three');
            })
            ->when($level === 3, function ($query) use ($name, $level_two) {
                $query->where('name', $name)->where('level_two', $level_two);
            })
            ->orderBy('id')
            ->get();

        return view('admin.student-class.index', compact('classes', 'name', 'level_two', 'level'));
    }

    public function create_page(Request $request)
    {
        $name = $request->query('name');
        $level_two = $request->query('level_two');
        $level = $level_two ? 3 : ($name ? 2 : 1);

        return view('admin.student-class.create', compact('name', 'level_two', 'level'));
    }

    public function create(Request $request)
    {
        $level = $request->integer('level', 1);

        if ($level === 1) {
            $request->validate([
                'name' => 'required|string|max:255|unique:student_classes,name',
            ]);
            StudentClass::create(['name' => $request->name]);
        } elseif ($level === 2) {
            $request->validate([
                'name' => 'required|string|max:255|exists:student_classes,name',
                'level_two' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('student_classes', 'level_two')->where('name', $request->name)->whereNull('level_three'),
                ],
            ]);
            StudentClass::create(['name' => $request->name, 'level_two' => $request->level_two]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'level_two' => 'required|string|max:255',
                'level_three' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('student_classes', 'level_three')->where('name', $request->name)->where('level_two', $request->level_two),
                ],
            ]);
            StudentClass::create([
                'name' => $request->name,
                'level_two' => $request->level_two,
                'level_three' => $request->level_three,
            ]);
        }

        return $this->redirectToList($level, $request->name, $request->level_two)
            ->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        $class = StudentClass::findOrFail($id);
        $level = $class->level_three ? 3 : ($class->level_two ? 2 : 1);

        return view('admin.student-class.edit', compact('class', 'level'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:student_classes,id',
            'level' => 'required|in:1,2,3',
        ]);

        $class = StudentClass::findOrFail($request->id);
        $level = $request->integer('level');

        if ($level === 1) {
            $request->validate([
                'name' => 'required|string|max:255|unique:student_classes,name,'.$class->id,
            ]);
            $oldName = $class->name;
            $class->update(['name' => $request->name]);
            StudentClass::where('name', $oldName)->where('id', '!=', $class->id)->update(['name' => $request->name]);
        } elseif ($level === 2) {
            $request->validate([
                'name' => 'required|string|max:255',
                'level_two' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('student_classes', 'level_two')->where('name', $request->name)->whereNull('level_three')->ignore($class->id),
                ],
            ]);
            $oldLevelTwo = $class->level_two;
            $class->update(['level_two' => $request->level_two]);
            StudentClass::where('name', $class->name)
                ->where('level_two', $oldLevelTwo)
                ->where('id', '!=', $class->id)
                ->update(['level_two' => $request->level_two]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'level_two' => 'required|string|max:255',
                'level_three' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('student_classes', 'level_three')
                        ->where('name', $request->name)
                        ->where('level_two', $request->level_two)
                        ->ignore($class->id),
                ],
            ]);
            $class->update(['level_three' => $request->level_three]);
        }

        return $this->redirectToList($level, $class->name, $class->level_two)
            ->with('success', 'Class updated successfully.');
    }

    // Delete class and its children
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:student_classes,id',
        ]);
        $class = StudentClass::findOrFail($request->id);
        $level = $class->level_three ? 3 : ($class->level_two ? 2 : 1);

        if ($level === 1) {
            StudentClass::where('name', $class->name)->delete();
        } elseif ($level === 2) {
            StudentClass::where('name', $class->name)->where('level_two', $class->level_two)->delete();
        } else {
            $class->delete();
        }

        return redirect()->back()->with('success', 'Class deleted successfully.');
    }

    // update status (not used by student classes)
    public function change_status(Request $request)
    {
        return response()->json(['status' => false, 'message' => 'Not supported for student classes.']);
    }

    private function redirectToList(int $level, ?string $name = null, ?string $levelTwo = null)
    {
        $params = [];
        if ($level >= 2 && $name) {
            $params['name'] = $name;
        }
        if ($level >= 3 && $levelTwo) {
            $params['level_two'] = $levelTwo;
        }

        return redirect()->route('admin.student-classes.view', $params);
    }
}
