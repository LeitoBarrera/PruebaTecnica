@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6 text-yellow-400">Editar Cóctel</h1>

    <form action="{{ route('cocktails.update', $cocktail->id) }}" method="POST" class="bg-gray-800 p-8 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div class="mb-6">
            <label for="nombre" class="block text-sm font-medium text-gray-300 mb-2">Nombre</label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre" 
                value="{{ $cocktail->nombre }}" 
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
                value="{{ $cocktail->categoria }}" 
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
                value="{{ $cocktail->tipo_bebida }}" 
                class="w-full p-3 rounded-md bg-gray-700 border border-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400"
            >
        </div>

        <!-- Botones de acción -->
        <div class="flex flex-col md:flex-row md:justify-between gap-4 mt-8">
            <button 
                type="submit" 
                class="w-full md:w-auto bg-yellow-400 text-black font-semibold py-3 px-6 rounded-md hover:bg-green-300 transition">
                Actualizar Cóctel
            </button>

            <a 
                href="/cocteles" 
                class="w-full md:w-auto bg-red-600 text-white font-semibold py-3 px-6 rounded-md hover:bg-red-500 transition text-center">
                Cancelar
            </a>
        </div>
    </form>
</div>

@if(session('success'))
    <!-- Pop-up de éxito -->
    <div id="success-popup" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-black p-6 rounded-md shadow-md text-center">
            <p class="mb-4 text-green-600 font-semibold">{{ session('success') }}</p>
            <button id="close-popup" class="bg-yellow-400 hover:bg-green-300 text-black font-bold py-2 px-4 rounded">
                Cerrar
            </button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#success-popup').fadeIn();

            $('#close-popup').click(function() {
                $('#success-popup').fadeOut();
                window.location.href = "{{ route('cocktails.saved') }}";
            });

            setTimeout(function() {
                window.location.href = "{{ route('cocktails.saved') }}";
            }, 3000);
        });
    </script>
@endif
@endsection
