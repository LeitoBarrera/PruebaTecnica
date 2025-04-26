@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Crear Nuevo Cóctel</h1>

    <form action="{{ route('cocktails.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Cóctel</label>
            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div class="mb-4">
            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-4">
            <label for="tipo_bebida" class="block text-sm font-medium text-gray-700">Tipo de Bebida</label>
            <input type="text" name="tipo_bebida" id="tipo_bebida" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full bg-green-500 text-black px-4 py-2 border border-gray-300 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                Guardar Cóctel
            </button>
        </div>
    </form>
</div>
@endsection
