@extends('layouts.app')

@section('title')
    Registrate
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12">
            <img 
                src="{{ asset('img/registrar.jpg') }}" 
                alt="imagen registro"
                class=" p-3"
            />
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" id="nameLabel" class=" mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        placeholder="Nombre"
                        class="border p-3 w-full rounded-xl @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                    />
                </div>
                @error('name')
                    <p class=" bg-red-500 text-white my-2 text-sm text-center">{{ $message }}</p>                    
                @enderror

                <div class="mb-5">
                    <label for="username" id="usernameLabel" class=" mb-2 block uppercase text-gray-500 font-bold">Usuario</label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username"
                        placeholder="Usuario"
                        class="border p-3 w-full rounded-xl @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                    />
                </div>
                @error('username')
                    <p class=" bg-red-500 text-white my-2 text-sm text-center">{{ $message }}</p>                    
                @enderror

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

                <div class="mb-5">
                    <label for="password_confirmation" id="password_confirmationLabel" class=" mb-2 block uppercase text-gray-500 font-bold">Repetir password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation"
                        placeholder="Repetir password"
                        class="border p-3 w-full rounded-xl"
                        value="{{ old('password_confirmation') }}"
                    />
                </div>
                <input 
                    type="submit" 
                    name="crearCuenta" 
                    id="crearCuenta"
                    value="Crear cuenta"
                    class=" bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-xl"
                
                />
            </form>
        </div>
    </div>
@endsection