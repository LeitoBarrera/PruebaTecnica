@extends('layouts.app')

@section('content')
<div class="bg-black text-yellow-400 min-h-screen flex flex-col items-center justify-center">

  <h1 class="text-4xl font-bold text-center animate-slide-fade-down">
    ¡Bienvenida a tu app de Cócteles!
  </h1>

  <a href="{{ url('/cocteles') }}">
  <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4 animate-slide-fade-up">
    Consultar Cócteles
  </button>
</a>

</div>

<!-- Animaciones personalizadas -->
<style>
    @keyframes slideFadeDown {
        0% { opacity: 0; transform: translateY(-50px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideFadeUp {
        0% { opacity: 0; transform: translateY(50px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .animate-slide-fade-down {
        animation: slideFadeDown 1s ease-out forwards;
    }

    .animate-slide-fade-up {
        animation: slideFadeUp 1s ease-out forwards;
        animation-delay: 0.5s;
    }
</style>
@endsection
