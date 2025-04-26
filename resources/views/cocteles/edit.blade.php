@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Editar Cóctel</h1>

    <form action="{{ route('cocktails.update', $cocktail->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Nombre</label>
            <input type="text" name="nombre" value="{{ $cocktail->nombre }}" class="w-full border-gray-300 rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Categoría</label>
            <input type="text" name="categoria" value="{{ $cocktail->categoria }}" class="w-full border-gray-300 rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Tipo de Bebida</label>
            <input type="text" name="tipo_bebida" value="{{ $cocktail->tipo_bebida }}" class="w-full border-gray-300 rounded p-2">
        </div>

        <div class="flex justify-between mt-4">
            <a href="{{ route('cocktails.saved') }}" class="text-gray-600 hover:underline">Cancelar</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
        </div>
    </form>
</div>
@endsection
