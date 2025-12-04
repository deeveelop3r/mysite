<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if (session('admin_authenticated')) {
            return redirect()->route('admin.projects.index');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $adminPassword = env('ADMIN_PASSWORD', 'admin123');

        if (hash_equals($adminPassword, $request->input('password'))) {
            session(['admin_authenticated' => true]);
            return redirect()->route('admin.projects.index')->with('success', 'Logged in successfully!');
        }

        return back()->with('error', 'Invalid admin password');
    }

    public function logout()
    {
        session()->forget('admin_authenticated');
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}
