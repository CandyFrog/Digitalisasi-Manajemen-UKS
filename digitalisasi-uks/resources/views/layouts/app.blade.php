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
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .soft-card {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 0 10px 40px -10px rgba(0,0,0,0.05);
            }
            .sidebar-link.active {
                background: linear-gradient(135deg, #0ea5e9, #10b981);
                color: white;
                box-shadow: 0 4px 15px -3px rgba(16, 185, 129, 0.4);
            }
            /* Custom scrollbar */
            ::-webkit-scrollbar { width: 6px; height: 6px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
            ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        </style>
    </head>
    <body class="antialiased text-gray-800 flex h-screen overflow-hidden bg-gradient-to-br from-[#e0f7fa] via-[#e8f5e9] to-[#f3e5f5]">

        <!-- Sidebar -->
        <aside class="w-64 bg-white/60 backdrop-blur-md border-r border-white/50 flex flex-col h-full hidden md:flex transition-all duration-300 z-20">
            <div class="h-20 flex items-center justify-center border-b border-white/50 px-6 mt-2">
                <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 to-emerald-600 tracking-tight">UKS Digital</span>
            </div>
            
            <nav class="flex-1 px-4 py-8 space-y-3 overflow-y-auto">
                <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Main Menu</p>
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-2xl transition-all duration-200 sidebar-link {{ request()->routeIs('dashboard') ? 'active' : 'text-gray-500 hover:bg-white/60 hover:text-cyan-600' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('treatments.index') }}" class="flex items-center px-4 py-3 rounded-2xl transition-all duration-200 sidebar-link {{ request()->routeIs('treatments.*') ? 'active' : 'text-gray-500 hover:bg-white/60 hover:text-cyan-600' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <span class="font-medium">Kunjungan UKS</span>
                </a>

                <a href="{{ route('medicines.index') }}" class="flex items-center px-4 py-3 rounded-2xl transition-all duration-200 sidebar-link {{ request()->routeIs('medicines.*') ? 'active' : 'text-gray-500 hover:bg-white/60 hover:text-cyan-600' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    <span class="font-medium">Stok Obat</span>
                </a>

                @if(auth()->user()->role === 'admin')
                <div class="pt-6 mt-6 border-t border-white/50">
                    <p class="px-3 text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Master Data</p>
                    
                    <a href="{{ route('students.index') }}" class="flex items-center px-4 py-3 rounded-2xl transition-all duration-200 sidebar-link {{ request()->routeIs('students.*') ? 'active' : 'text-gray-500 hover:bg-white/60 hover:text-cyan-600' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="font-medium">Data Siswa</span>
                    </a>

                    <a href="{{ route('classes.index') }}" class="flex items-center px-4 py-3 rounded-2xl transition-all duration-200 sidebar-link {{ request()->routeIs('classes.*') ? 'active' : 'text-gray-500 hover:bg-white/60 hover:text-cyan-600' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span class="font-medium">Data Kelas</span>
                    </a>

                    <a href="{{ route('reports.index') }}" class="flex items-center px-4 py-3 mt-2 rounded-2xl transition-all duration-200 sidebar-link {{ request()->routeIs('reports.*') ? 'active' : 'text-gray-500 hover:bg-white/60 hover:text-cyan-600' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="font-medium">Laporan Bulanan</span>
                    </a>
                </div>
                @endif
            </nav>
            
            <div class="p-5 border-t border-white/50">
                <div class="flex items-center px-4 py-3 bg-white/50 rounded-2xl shadow-sm border border-white/60">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-400 to-emerald-400 flex items-center justify-center text-white font-bold mr-3 shadow-md">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold text-gray-800 truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-emerald-600 font-medium truncate capitalize">{{ auth()->user()->role }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden relative">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-8 pt-4">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
