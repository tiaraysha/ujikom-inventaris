<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 'Admin') {
                return redirect()->route('admin.category')->with('success', 'Login berhasil!');
            } else if(Auth::user()->role == 'Staff') {
                return redirect()->route('lending')->with('success', 'Login berhasil!');
            }
        }

        return redirect()->back()->withErrors(['error' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function index() {
        $users = User::all();

        return view('admin.user', compact('users'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $rawPassword = substr($request->email, 0, 4);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'password' => Hash::make($rawPassword),
        ]);

        return redirect()->route('admin.user')->with('success_user', 'User berhasil ditambahkan! <br> Password: ' . $rawPassword);
        
    }
}
