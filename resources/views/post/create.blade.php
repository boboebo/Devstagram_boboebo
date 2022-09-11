@extends('layouts.app')

@section('title')
Crear Post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')

    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form 
                method="POST" 
                action="{{ route('images.store') }}" 
                id="dropzone" 
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center"
                enctype="multipart/form-data">
                @csrf
            </form>
        </div>
        <div class="md:w-4/12 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
            
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" id="titleLabel" class=" mb-2 block uppercase text-gray-500 font-bold">Titulo</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title"
                        placeholder="Titulo"
                        class="border p-3 w-full rounded-xl @error('name') border-red-500 @enderror"
                        value="{{ old('title') }}"
                    />
                </div>
                @error('title')
                    <p class=" bg-red-500 text-white my-2 text-sm text-center">{{ $message }}</p>                    
                @enderror

                <div class="mb-5">
                    <label for="description" id="descriptionLabel" class=" mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                    <textarea 
                        name="description" 
                        id="description"
                        placeholder="Descripcion"
                        class="border p-3 w-full rounded-xl @error('name') border-red-500 @enderror"
                    >{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <p class=" bg-red-500 text-white my-2 text-sm text-center">{{ $message }}</p>                    
                @enderror

                <div class="mb-5">
                    <input 
                        name="imagen"
                        type="hidden"
                        value="{{ old('imagen') }}"
                    >
                </div>
                @error('imagen')
                    <p class=" bg-red-500 text-white my-2 text-sm text-center">{{ $message }}</p>                    
                @enderror

                <input 
                    type="submit" 
                    name="crearPost" 
                    id="crearPost"
                    value="Crear Post"
                    class=" bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-xl"
                />
            </form>



        </div>

    </div>

@endsection