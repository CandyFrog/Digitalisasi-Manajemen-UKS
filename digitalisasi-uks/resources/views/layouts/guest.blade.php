<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .glass-panel {
                background: rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased relative">
        <!-- Background Image -->
        <div class="fixed inset-0 z-[-1] bg-cover bg-center bg-no-repeat" style="background-image: url('https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?q=80&w=2074&auto=format&fit=crop');">
            <!-- Overlay to darken the forest a bit -->
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10 px-4">
            <div class="mb-6 flex flex-col items-center">
                <div class="w-20 h-20 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center shadow-lg mb-2 p-2 border border-white/20">
                    <svg class="w-12 h-12 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h1 class="text-3xl font-bold text-white tracking-wide shadow-black drop-shadow-md">DIGITAL UKS</h1>
            </div>

            <div class="w-full sm:max-w-md px-8 py-10 glass-panel rounded-3xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
