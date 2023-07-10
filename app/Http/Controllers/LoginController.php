<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()               //////////// metodo para mostrar la vista
    {
        return view('auth.login');
    }

    public function store(Request $request)   /////// metodo para guardar
    {
        $this->validateInput($request);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'credenciales invalidas');
        }

        return redirect()->route('posts.index', [
            'user' => auth()->user()
        ]);
    }

    public function validateInput(Request $request)   //////// validacion de datos q llegan al store
    {
        $this->validate($request, [
            'email' => 'Required|email',
            'password' => ['required']
        ]);
    }
}
