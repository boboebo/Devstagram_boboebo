<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create(Request $request)
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);

        dd($request);
        // Post::create([
        //     'name' => $request->name,
        //     'username' => Str::slug($request->username),
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);
    }

    public function validateInput(Request $request)
    {
        $this->validate($request, [
            'title' => 'Required|Min:5|Max:30',
            'description' => 'Required|Min:5|Max:300',
            'imagen' => 'Required'
        ]);
    }
}
