<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index(Request $request, $level = null)
    {
        $classes = StudentClass::where(function ($query) use ($request, $level) {
            if ($level) {
                $query->where('level_two', $level)
                    ->orWhere('level_three', $level)
                    ->orWhere('level_four', $level);
            } else {
                $query->whereNull('level_two');
            }

            if ($request->has('status')) {
                $query->where('status', $request->status);
            }
            if ($request->has('search') && $request->search) {
                $query->where('name', 'like', '%'.$request->search.'%');
            }
        })->paginate(20);

        return view('admin.student-class.index', compact('classes', 'level'));
    }

    public function create_page($parent_id = null)
    {
        $categories = StudentClass::whereNull('parent_id')->orderBy('order')->get();

        return view('admin.student-class.create', compact('categories', 'parent_id'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:3000',
            'parent_id' => 'nullable|integer|exists:categories,id',
        ]);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ];
        if ($request->file('image')) {
            $data['images'] = upload_file($request->file('image'), 'categories');
        }

        // return $data;
        StudentClass::updateOrCreate($data);

        return redirect()->route('admin.student-classes.view', ['parent_id' => $request->parent_id ?? null])->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = StudentClass::findOrFail($id);
        $categories = StudentClass::whereNull('parent_id')->orderBy('order')->get();

        return view('admin.student-class.edit', compact('category', 'categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$request->id,
            'description' => 'nullable|string|max:3000',
            'parent_id' => 'nullable|integer|exists:categories,id',
        ]);
        $category = StudentClass::findOrFail($request->id);
        $images = $category->images;
        if ($request->file('image')) {
            $images = upload_file($request->file('image'), 'categories');
        }
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'images' => $images,
        ]);

        return redirect()->route('admin.student-classes.view', ['parent_id' => $category->parent_id ?? null])->with('success', 'Category updated successfully.');
    }

    // Delete user role
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id',
        ]);
        $category = StudentClass::findOrFail($request->id);
        if ($category->Subcategories()->count() > 0) {
            foreach ($category->Subcategories as $subcategory) {
                if ($subcategory->images) {
                    delete_files($subcategory->images);
                }
            }
        }
        if ($category->images) {
            delete_files($category->images);
        }
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    // update status
    public function change_status(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:categories,id',
        ]);
        StudentClass::where('id', $request->id)->update([
            'status' => ! $request->status,
        ]);

        return response()->json(['status' => true, 'message' => translate('Category status update successfully!')]);
    }
}
