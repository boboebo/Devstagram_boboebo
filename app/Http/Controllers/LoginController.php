<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'credenciales invalidas');
        }

        return redirect()->route('posts.index', [
            'user' => auth()->user()
        ]);
    }

    public function validateInput(Request $request)
    {
        $this->validate($request, [
            'email' => 'Required|email',
            'password' => ['required']
        ]);
    }
}
