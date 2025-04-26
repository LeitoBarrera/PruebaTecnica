@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 text-center p-4">
    <h1 class="text-5xl font-bold mb-8 text-gray-800">Cócteles API</h1>

    <a href="{{ route('cocktails.index') }}" 
       class="px-8 py-3 border-2 border-black text-black rounded-lg text-lg font-semibold hover:bg-black hover:text-white transition duration-300">
        Ingresar
    </a>
</div>
@endsection
