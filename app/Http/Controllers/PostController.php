<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(4);
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create(Request $request)
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);

        // Post::create([
        //     'titulo' => $request->title,
        //     'descripcion' => $request->description,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        // Otra forma de guardar
        // $post = new post();
        // $post->titulo = $request->title;
        // $post->descripcion = $request->description;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // Otra forma mas: usando relaciones Elocuent
        $request->user()->posts()->create([
            'titulo' => $request->title,
            'descripcion' => $request->description,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);


        return redirect()->route('posts.index', auth()->user()->username);
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
