@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Cócteles Guardados</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($cocteles as $coctel)
            <div class="bg-white rounded shadow p-4 flex flex-col items-center">
                <h2 class="text-lg font-semibold mb-2 text-center">{{ $coctel->nombre }}</h2>
                <p class="text-gray-500 text-sm mb-2">Categoría: {{ $coctel->categoria ?? 'No disponible' }}</p>
                <p class="text-gray-500 text-sm mb-4">Tipo: {{ $coctel->tipo_bebida ?? 'No disponible' }}</p>
                <a href="{{ route('cocktails.edit', $coctel->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 mb-2">Editar</a>
                <form action="{{ route('cocktails.destroy', $coctel->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Eliminar</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
