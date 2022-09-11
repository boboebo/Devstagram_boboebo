<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
//use Illuminate\Support\Facades\Route;
//use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);

        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', [
            'user' => auth()->user()
        ]);
    }

    public function validateInput(Request $request)
    {
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        $this->validate($request, [
            'name' => 'Required|min:5|max:30',
            'username' => 'Required|unique:users|without_spaces',
            'email' => 'Required|unique:users',
            'password' => ['required', 'min:3', 'confirmed']
        ]);
    }
}
