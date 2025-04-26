@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Cócteles Guardados</h1>

    @foreach ($cocteles as $cocktail)
        <div class="cocktail-card mb-4">
            <div>
                <h2 class="cocktail-title">{{ $cocktail->nombre }}</h2>
                <p class="cocktail-category">Categoría: {{ $cocktail->categoria }}</p>
                <p class="cocktail-type">Tipo de bebida: {{ $cocktail->tipo_bebida }}</p>
            </div>

            <div class="flex gap-4">
                <!-- Botón de Editar -->
                <a href="{{ route('cocktails.edit', $cocktail->id) }}" class="btn-edit">
                    Editar
                </a>

                <!-- Botón de Eliminar -->
                <form action="{{ route('cocktails.destroy', $cocktail->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este cóctel?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

<!-- Pop-up de éxito -->
@if(session('success'))
    <div id="success-popup" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-md shadow-md">
            <p>{{ session('success') }}</p>
            <button id="close-popup" class="bg-green-600 text-white px-4 py-2 mt-4 rounded-md">Cerrar</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Muestra el pop-up con un efecto de fadeIn
            $('#success-popup').fadeIn();

            // Cierra el pop-up cuando se hace clic en el botón "Cerrar"
            $('#close-popup').click(function() {
                $('#success-popup').fadeOut();
                // Redirige a la página de cócteles después de cerrar el pop-up
                window.location.href = "{{ route('cocktails.index') }}";
            });

            // Redirige automáticamente después de 3 segundos si el pop-up no se cierra
            setTimeout(function() {
                window.location.href = "{{ route('cocktails.index') }}";
            }, 3000); // Cambia el tiempo si lo deseas
        });
    </script>
@endif
@endsection

<style>
    /* Estilo para la tarjeta del cóctel */
    .cocktail-card {
        background-color: #fff;
        padding: 1rem;
        border-radius: 0.375rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Título del cóctel */
    .cocktail-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    /* Categoría y tipo de bebida */
    .cocktail-category, .cocktail-type {
        font-size: 1rem;
        color: #4b5563;
    }

    /* Botón de Editar */
    .btn-edit {
        background-color: #fff;
        border: 1px solid #000;
        color: #000;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-edit:hover {
        background-color: #f1f5f9;
    }

    /* Botón de Eliminar */
    .btn-delete {
        background-color: #dc2626;
        border: 1px solid #9b1c1c;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #b91c1c;
    }
</style>
