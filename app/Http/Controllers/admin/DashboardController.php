<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login.index');
    }
}
