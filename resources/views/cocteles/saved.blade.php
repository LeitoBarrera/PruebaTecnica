@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6 text-yellow-400">Cócteles Guardados</h1>

    @foreach ($cocteles as $cocktail)
        <div class="cocktail-card mb-6 p-6 rounded-lg shadow-lg bg-gray-800 flex justify-between items-center">
            <div>
                <h2 class="cocktail-title text-2xl font-bold mb-2">{{ $cocktail->nombre }}</h2>
                <p class="cocktail-category text-gray-400">Categoría: {{ $cocktail->categoria }}</p>
                <p class="cocktail-type text-gray-400">Tipo de bebida: {{ $cocktail->tipo_bebida }}</p>
            </div>

            <div class="flex gap-4">
                <!-- Botón de Editar -->
                <a href="{{ route('cocktails.edit', $cocktail->id) }}" class="btn-edit bg-yellow-400 text-black px-4 py-2 rounded-md hover:bg-yellow-300 transition">
                    Editar
                </a>

                <!-- Botón de Eliminar -->
                <form action="{{ route('cocktails.destroy', $cocktail->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este cóctel?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Botón Volver -->
    <div class="mt-8">
        <a href="/cocteles" class="bg-yellow-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-md transition">
            Volver
        </a>
    </div>
</div>

<!-- Pop-up de éxito -->
@if(session('success'))
    <div id="success-popup" class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg text-center">
            <p class="text-white">{{ session('success') }}</p>
            <button id="close-popup" class="bg-green-600 text-white px-6 py-2 mt-6 rounded-md hover:bg-green-700 transition">
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
                window.location.href = "{{ route('cocktails.index') }}";
            });

            setTimeout(function() {
                window.location.href = "{{ route('cocktails.index') }}";
            }, 3000);
        });
    </script>
@endif
@endsection
