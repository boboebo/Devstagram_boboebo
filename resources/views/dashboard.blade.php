@extends('layouts.app')

@section('title')
Perfil: {{$user->username}}
@endsection

@section('content')

    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-start md:justify-center py-10 md:py-10">
                <p class=" text-gray-700 text-2xl">{{ $user->username }}</p>
                <p class=" text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Seguidores</span>
                </p>
                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    0 
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    0 
                    <span class="font-normal">Post</span>
                </p>
                <p></p>
            </div>
        </div>
    </div>

    <section class=" container mx-auto mt-10">
        <h2 class=" text-4xl text-center font-black my-10">Publicaciones</h2>
        
        @if ($posts->count())
        <div class=" grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a>
                        <img src="{{ asset('uploads'). '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class=" my-10">
            {{ $posts->links() }}
        </div>

        @else
        <h4 class=" text-gray-600 uppercase text-left font-bold my-10">El ususario no posee publicaciones</h4>
        @endif


        

    </section>

@endsection

