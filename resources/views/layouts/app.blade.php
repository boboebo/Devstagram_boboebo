<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Devstagram - @yield('title')</title>

    <!-- Styles -->
    @stack('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


</head>

<body class="bg-gray-100">
    {{-- <nav class="bg-gray-200 ">
        <a href="/principal">Principal |</a>
        <a href="/nosotros">Nosotros |</a>
        @yield('salida')
    </nav>
    <h1 class="text-2xl">@yield('title')</h1>
    <br>
    <h2>@yield('contenido')</h2> --}}

    <header class="p-5 border-b bg-white shadow" >
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                DevStagram
            </h1>
            <nav class="flex gap-2 items-center">
                @auth
                    <a href="{{route('post.create')}}"
                        class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                        Crear
                    </a>
                    <a href="{{route('posts.index', auth()->user())}}" class=" font-bold text-gray-600 text-sm">
                        Hola <span class="font-normal"> {{ auth()->user()->username }} |</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar Sesion</button>
                    </form>
                @endauth
                @guest
                    <a href="{{route('login')}}" class="font-bold uppercase text-gray-600 text-sm">Login |</a>
                    <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
                @endguest
            </nav>
        </div>
        
    </header>

    <main class="container mx-auto mt-10">        
        <h2 class="font-black text-center text-3xl mb-10">@yield('title')</h2>
        @yield('content')
    </main>


    <footer class=" mt-10">
        <h2 class="text-center p-10 text-gray-400">DevStagram - {{ now()->year }}</h2> {{-- now Laravel Helper --}}
        @yield('footer')
    </footer>

</body>

</html>