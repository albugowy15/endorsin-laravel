<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|min:5|max:50|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:16'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        //$request->session()->flash('success', 'Registration successfull! Please Login');

        return redirect('/login')->with('success', 'Registration successfull! Please Login');
    }
}
