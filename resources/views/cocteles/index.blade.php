@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black text-yellow-400 container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center text-yellow-400 mb-10 animate-slide-fade-down">
        Listado de Cócteles
    </h1>

    <div class="flex justify-center gap-6 mb-10">
        <!-- Botón Ver Cócteles Guardados -->
        <a href="{{ route('cocktails.saved') }}" class="bg-yellow-400 text-black font-semibold py-2 px-6 rounded hover:bg-yellow-300 transition duration-300">
            Ver Cócteles Guardados
        </a>

        <!-- Botón Crear Nuevo Cóctel -->
        <a href="{{ route('cocktails.create') }}" class="bg-green-500 text-white hover:bg-green-600 font-semibold py-2 px-6 rounded transition duration-300">
            Crear Nuevo Cóctel
        </a>
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        @foreach ($cocteles as $cocktail)
            <div class="bg-gray-900 p-6 rounded-lg shadow-lg flex flex-col justify-between hover:shadow-2xl transition-shadow duration-300">
                <div>
                    <h2 class="text-2xl font-bold text-yellow-400 mb-2">{{ $cocktail['strDrink'] }}</h2>
                    <p class="text-gray-400">Categoría: <span class="font-semibold">{{ $cocktail['strCategory'] ?? 'No disponible' }}</span></p>
                    <p class="text-gray-400">Tipo de bebida: <span class="font-semibold">{{ $cocktail['strAlcoholic'] ?? 'No disponible' }}</span></p>
                </div>

                <form action="{{ route('cocktails.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="nombre" value="{{ $cocktail['strDrink'] }}">
                    <input type="hidden" name="categoria" value="{{ $cocktail['strCategory'] }}">
                    <input type="hidden" name="tipo_bebida" value="{{ $cocktail['strAlcoholic'] }}">

                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-black font-bold py-2 rounded transition duration-300">
                        Guardar
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<!-- Pop-up de éxito -->
@if(session('success'))
    <div id="success-popup" class="fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50">
        <div class="bg-gray-900 p-8 rounded-lg shadow-lg text-center">
            <p class="text-green-400 font-bold text-xl">{{ session('success') }}</p>
        </div>
    </div>
@endif

<!-- jQuery para mostrar el pop-up -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        @if(session('success'))
            $('#success-popup').fadeIn();
            setTimeout(function() {
                $('#success-popup').fadeOut();
            }, 3000);
        @endif
    });
</script>
@endsection
