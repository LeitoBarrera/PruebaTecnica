@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center h-screen">
    <h1 class="text-4xl font-bold mb-6">Cocteles API</h1>
    <a href="{{ route('cocktails.index') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-green-700">
        Ingresar
    </a>
</div>
@endsection
