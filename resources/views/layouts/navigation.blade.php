<nav class="bg-white shadow fixed bottom-0 w-full md:static md:w-auto md:shadow-none">
    <div class="flex justify-around md:justify-center md:gap-44 p-8">
        <!-- Inicio -->
        <a href="{{ route('inicio') }}" class="flex flex-col items-center text-gray-500 hover:text-black transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75V21a1.5 1.5 0 01-1.5 1.5H4.5A1.5 1.5 0 013 21V9.75z" />
            </svg>
            <span class="text-base font-bold">Inicio</span>
        </a>

        <!-- Buscar -->
        <a href="{{ route('buscar') }}" class="flex flex-col items-center text-gray-500 hover:text-black transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a7 7 0 017 7 7 7 0 01-7 7 7 7 0 01-7-7 7 7 0 017-7zm0 0l6 6" />
            </svg>
            <span class="text-base font-bold">Buscar</span>
        </a>

        <!-- Usuarios -->
        <a href="{{ route('usuarios') }}" class="flex flex-col items-center text-gray-500 hover:text-black transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m5-4a3 3 0 11-6 0 3 3 0 016 0zm6 0a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="text-base font-bold">Usuarios</span>
        </a>

        <!-- Archivos -->
        <a href="{{ route('archivos') }}" class="flex flex-col items-center text-gray-500 hover:text-black transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16V4a2 2 0 012-2h8l6 6v8a2 2 0 01-2 2H6a2 2 0 01-2-2z" />
            </svg>
            <span class="text-base font-bold">Archivos</span>
        </a>

        <!-- Trabajos -->
        <a href="{{ route('trabajos') }}" class="flex flex-col items-center text-gray-500 hover:text-black transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4H8a2 2 0 00-2 2v2h12V6a2 2 0 00-2-2h-4zm0 4H4v10a2 2 0 002 2h12a2 2 0 002-2V8h-8z" />
            </svg>
            <span class="text-base font-bold">Trabajos</span>
        </a>
    </div>
</nav>
