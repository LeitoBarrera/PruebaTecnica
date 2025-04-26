@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Listado de Cócteles</h1>

    <div class="flex justify-center gap-4 mb-6">
        <!-- Botón Ver Cócteles Guardados -->
        <a href="{{ route('cocktails.saved') }}" class="btn-primary">
            Ver cócteles guardados
        </a>

        <!-- Botón Crear Nuevo Cóctel -->
        <a href="{{ route('cocktails.create') }}" class="btn-secondary">
            Crear Nuevo Cóctel
        </a>
    </div>

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

                <button type="submit" class="btn-action">
                    Guardar
                </button>
            </form>
        </div>
    @endforeach

</div>

<!-- Pop-up de éxito -->
@if(session('success'))
    <div id="success-popup" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-md shadow-md">
            <p>{{ session('success') }}</p>
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

        $('#close-popup').click(function() {
            $('#success-popup').fadeOut();
        });
    });
</script>
@endsection

<style>
    /* Botón primario (Ver cócteles guardados) */
    .btn-primary {
        display: inline-block;
        border: 1px solid #000;
        color: #000;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #f1f5f9;
    }

    /* Botón secundario (Crear nuevo cóctel) */
    .btn-secondary {
        display: inline-block;
        border: 1px solid #10B981;
        color: #10B981;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #059669;
        color: white;
    }

    /* Botón de acción (Guardar cóctel) */
    .btn-action {
        background-color: #10B981;
        color: black;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        border: 1px solid #D1D5DB;
        transition: background-color 0.3s ease;
    }

    .btn-action:hover {
        background-color: #059669;
    }
</style>
