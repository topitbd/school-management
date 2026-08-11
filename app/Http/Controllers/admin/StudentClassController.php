<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.student-class.index');
    }

    public function create_page()
    {
        return view('admin.student-class.create');
    }

    public function create(Request $request) {}

    public function edit($id)
    {

        return view('admin.student-class.edit');
    }

    public function update(Request $request) {}

    // Delete user role
    public function delete(Request $request) {}

    // update status
    public function change_status(Request $request) {}
}
