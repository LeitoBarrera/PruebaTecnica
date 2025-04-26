@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 max-w-xl">
    <h1 class="text-2xl font-bold mb-4">Editar Cóctel</h1>

    <form action="{{ route('cocktails.update', $cocktail->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <!-- Campo Nombre -->
        <div class="form-group mb-4">
            <label for="nombre" class="block font-semibold mb-1">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ $cocktail->nombre }}" class="input-field" required>
        </div>

        <!-- Campo Categoría -->
        <div class="form-group mb-4">
            <label for="categoria" class="block font-semibold mb-1">Categoría</label>
            <input type="text" name="categoria" id="categoria" value="{{ $cocktail->categoria }}" class="input-field">
        </div>

        <!-- Campo Tipo de Bebida -->
        <div class="form-group mb-4">
            <label for="tipo_bebida" class="block font-semibold mb-1">Tipo de Bebida</label>
            <input type="text" name="tipo_bebida" id="tipo_bebida" value="{{ $cocktail->tipo_bebida }}" class="input-field">
        </div>

        <!-- Botones de acción -->
        <div class="flex justify-between mt-4">
            <a href="{{ route('cocktails.saved') }}" class="btn-cancelar">
                Cancelar
            </a>
            <button type="submit" class="btn-actualizar">
                Actualizar
            </button>
        </div>
    </form>
</div>

@if(session('success'))
    <!-- Pop-up de éxito -->
    <div id="success-popup" class="popup-overlay flex justify-center items-center z-50">
        <div class="popup-content bg-white p-6 rounded-md shadow-md">
            <p>{{ session('success') }}</p>
            <button id="close-popup" class="btn-close">
                Cerrar
            </button>
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
                // Redirige a la página de cócteles guardados después de cerrar el pop-up
                window.location.href = "{{ route('cocktails.saved') }}";
            });

            // Redirige automáticamente después de 3 segundos si el pop-up no se cierra
            setTimeout(function() {
                window.location.href = "{{ route('cocktails.saved') }}";
            }, 3000); // Cambia el tiempo si lo deseas
        });
    </script>
@endif

@endsection

<!-- Estilos -->
<style>
    /* Estilos generales */
    .input-field {
        width: 100%;
        padding: 0.75rem;
        border-radius: 0.375rem;
        border: 1px solid #d1d5db;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    /* Botón Cancelar */
    .btn-cancelar {
        padding: 0.5rem 1rem;
        border: 1px solid #4caf50;
        background-color: white;
        color: #4caf50;
        border-radius: 0.375rem;
        transition: background-color 0.3s;
    }

    .btn-cancelar:hover {
        background-color: #4caf50;
        color: white;
    }

    /* Botón Actualizar */
    .btn-actualizar {
        padding: 0.5rem 1rem;
        border: 1px solid #4caf50;
        background-color: #4caf50;
        color: white;
        border-radius: 0.375rem;
        transition: background-color 0.3s;
    }

    .btn-actualizar:hover {
        background-color: #45a049;
    }

    /* Pop-up */
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
    }

    .popup-content {
        background-color: white;
        padding: 1rem;
        border-radius: 0.375rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Botón de Cerrar Pop-up */
    .btn-close {
        padding: 0.5rem 1rem;
        background-color: #4caf50;
        color: white;
        border-radius: 0.375rem;
        border: none;
        cursor: pointer;
    }

    .btn-close:hover {
        background-color: #45a049;
    }
</style>
