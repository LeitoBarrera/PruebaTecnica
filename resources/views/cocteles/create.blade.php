@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-6">Crear Nuevo Cóctel</h1>

    <form action="{{ route('cocktails.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Nombre del Cóctel -->
        <div class="form-group mb-4">
            <label for="nombre" class="form-label">Nombre del Cóctel</label>
            <input type="text" name="nombre" id="nombre" class="form-input" required>
        </div>

        <!-- Categoría -->
        <div class="form-group mb-4">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-input">
        </div>

        <!-- Tipo de Bebida -->
        <div class="form-group mb-4">
            <label for="tipo_bebida" class="form-label">Tipo de Bebida</label>
            <input type="text" name="tipo_bebida" id="tipo_bebida" class="form-input">
        </div>

        <!-- Botón de Guardar -->
        <div class="mt-6">
            <button type="submit" class="btn-submit w-full">
                Guardar Cóctel
            </button>
        </div>
    </form>
</div>
@endsection

<style>
    /* Estilos Generales */
    .form-group label {
        font-size: 0.875rem;
        font-weight: 500;
        color: #4A4A4A;
    }

    .form-input {
        margin-top: 0.25rem;
        padding: 0.5rem 1rem;
        width: 100%;
        border: 1px solid #D1D5DB;
        border-radius: 0.375rem;
        outline: none;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        ring: 2px;
        ring-color: #3B82F6;
    }

    .btn-submit {
        background-color: #10B981;
        color: black;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        border: 1px solid #D1D5DB;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #059669;
    }
</style>
