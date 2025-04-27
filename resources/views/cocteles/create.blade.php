@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6 text-yellow-400">Crear Nuevo Cóctel</h1>

    <form action="{{ route('cocktails.store') }}" method="POST" class="bg-gray-800 p-8 rounded-lg shadow-lg">
        @csrf

        <!-- Nombre del Cóctel -->
        <div class="mb-6">
            <label for="nombre" class="block text-sm font-medium text-gray-300 mb-2">Nombre del Cóctel</label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre" 
                class="w-full p-3 rounded-md bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400" 
                required
            >
        </div>

        <!-- Categoría -->
        <div class="mb-6">
            <label for="categoria" class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
            <input 
                type="text" 
                name="categoria" 
                id="categoria" 
                class="w-full p-3 rounded-md bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
            >
        </div>

        <!-- Tipo de Bebida -->
        <div class="mb-6">
            <label for="tipo_bebida" class="block text-sm font-medium text-gray-300 mb-2">Tipo de Bebida</label>
            <input 
                type="text" 
                name="tipo_bebida" 
                id="tipo_bebida" 
                class="w-full p-3 rounded-md bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
            >
        </div>

        <!-- Botones de Guardar y Cancelar -->
        <div class="mt-8 flex flex-col gap-4">
            <button 
                type="submit" 
                class="w-full bg-yellow-400 text-black font-semibold py-3 rounded-md hover:bg-green-300 transition">
                Guardar Cóctel
            </button>

            <a 
                href="/cocteles" 
                class="w-full text-center bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-md transition">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
