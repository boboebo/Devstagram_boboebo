@extends('layouts.app')

@section('title')
    Iniciar Sesion
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12">
            <img 
                src="{{ asset('img/login.jpg') }}" 
                alt="imagen login"
                class=" p-3"
            />
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if(session('mensaje'))
                    <p class=" bg-red-500 text-white my-2 text-sm text-center">{{session('mensaje')}}</p>
                @endif

                <div class="mb-5">
                    <label for="email" id="emailLabel" class=" mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        placeholder="email"
                        class="border p-3 w-full rounded-xl @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                    />
                </div>
                @error('email')
                    <p class=" bg-red-500 text-white my-2 text-sm text-center">{{ $message }}</p>                    
                @enderror

                <div class="mb-5">
                    <label for="password" id="passwordLabel" class=" mb-2 block uppercase text-gray-500 font-bold">password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        placeholder="password"
                        class="border p-3 w-full rounded-xl @error('password') border-red-500 @enderror"
                        value="{{ old('password') }}"
                    />
                </div>
                @error('password')
                    <p class=" bg-red-500 text-white my-2 text-sm text-center">{{ $message }}</p>                    
                @enderror

                <div class=" mb-5">
                    <input type="checkbox" name="remember"><label class=" text-gray-500 text-sm px-3" for="keepopen">Mantener abierta Sesion</label>
                </div>

                <input 
                    type="submit" 
                    name="login" 
                    id="login"
                    value="Ingresar"
                    class=" bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-xl"
                
                />
            </form>
        </div>
    </div>
@endsection