@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Listado de Cócteles</h1>

    @foreach ($cocteles as $cocktail)
        <div class="bg-white p-4 rounded-md shadow-md mb-4 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold">{{ $cocktail['strDrink'] }}</h2>
                <p>Categoría: {{ $cocktail['strCategory'] ?? 'No disponible' }}</p>
                <p>Tipo de bebida: {{ $cocktail['strAlcoholic'] ?? 'No disponible' }}</p>
            </div>

            <form action="{{ route('cocktails.store') }}" method="POST">
                @csrf
                <input type="hidden" name="nombre" value="{{ $cocktail['strDrink'] }}">
                <input type="hidden" name="categoria" value="{{ $cocktail['strCategory'] }}">
                <input type="hidden" name="tipo_bebida" value="{{ $cocktail['strAlcoholic'] }}">

                <button type="submit" class="bg-white border border-black text-black px-4 py-2 rounded-md hover:bg-gray-100 shadow">
                    Guardar
                </button>
            </form>
        </div>
    @endforeach

    <!-- Botón para ver cócteles guardados -->
    <div class="text-center mt-10">
        <a href="{{ route('cocktails.saved') }}" class="inline-block border border-blue-600 text-blue-600 px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition">
            Ver cócteles guardados
        </a>
    </div>
</div>

<!-- Pop-up de éxito -->
@if(session('success'))
    <div id="success-popup" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-md shadow-md">
            <p>{{ session('success') }}</p>
            <button id="close-popup" class="bg-blue-600 text-white px-4 py-2 mt-4 rounded-md">Cerrar</button>
        </div>
    </div>
@endif

<!-- jQuery para mostrar el pop-up -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Verifica si hay un mensaje de éxito
        @if(session('success'))
            // Muestra el pop-up
            $('#success-popup').fadeIn();

            // Después de 3 segundos (3000 milisegundos), cierra el pop-up automáticamente
            setTimeout(function() {
                $('#success-popup').fadeOut();
            }, 3000); // Cambia 3000 por el tiempo en milisegundos que deseas
        @endif

        // Cerrar el pop-up cuando se hace clic en el botón
        $('#close-popup').click(function() {
            $('#success-popup').fadeOut();
        });
    });
</script>

@endsection
