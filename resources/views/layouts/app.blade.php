<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">

        <!-- NAVBAR -->
        <nav class="bg-white shadow-md fixed bottom-0 w-full md:static md:top-0 z-50">
            <div class="flex justify-around md:justify-center md:space-x-24 py-4">
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-black">
                    <i class="fas fa-home fa-2x"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-black">
                    <i class="fas fa-search fa-2x"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-black">
                    <i class="fas fa-users fa-2x"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-black">
                    <i class="fas fa-folder fa-2x"></i>
                </a>
                <a href="#" class="text-gray-500 hover:text-black">
                    <i class="fas fa-briefcase fa-2x"></i>
                </a>
            </div>
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow mt-16 md:mt-0">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-grow pt-16 md:pt-0">
            @yield('content')
        </main>

    </div>
</body>
</html>
