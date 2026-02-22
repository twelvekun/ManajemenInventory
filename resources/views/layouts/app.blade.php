<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Manajemen Inventory') - Hadrah Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-bone-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 w-64 h-full bg-white border-r-2 border-bone-300 flex flex-col">
            <!-- Logo/Brand -->
            <div class="p-6 border-b-2 border-bone-300">
                <h2 class="text-xl font-bold text-black">Dashboard</h2>
                <p class="text-xs text-gray-500 mt-1">Hadrah Store Lamongan</p>
            </div>
            <!-- Navigation -->
            <nav class="flex-1 px-3 py-4 overflow-y-auto">
                <div class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-neutral-800/10 text-black' : 'text-gray-700 hover:bg-bone-200' }} transition-colors group">
                        <svg class="w-5 h-4 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        <span class="font-small">Dashboard</span>
                    </a>

                    @can('view-products')
                    <a href="{{ route('products.index') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('products.*') ? 'bg-neutral-800/10 text-black' : 'text-gray-700 hover:bg-bone-200' }} transition-colors group">
                        <svg class="w-5 h-4 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span class="font-small">Produk</span>
                    </a>
                    @endcan

                    @can('view-sales')
                    <a href="{{ route('sales.index') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('sales.*') ? 'bg-neutral-800/10 text-black' : 'text-gray-700 hover:bg-bone-200' }} transition-colors group">
                        <svg class="w-5 h-4 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span class="font-small">Penjualan</span>
                    </a>
                    @endcan

                    <!-- @can('view-reports')
                    <a href="#" class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-bone-200 transition-colors group">
                        <svg class="w-5 h-4 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="font-small">Laporan</span>
                    </a>
                    @endcan -->

                    @can('view-predictions')
                    <a href="{{ route('predictions.index') }}" class="flex items-center px-3 py-2.5 rounded-lg {{ request()->routeIs('predictions.*') ? 'bg-orange-500/10 text-black' : 'text-gray-700 hover:bg-bone-200' }} transition-colors group">
                        <svg class="w-5 h-4 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        <span class="font-small">Prediksi</span>
                    </a>
                    @endcan
                </div>

                <!-- Pengaturan Section -->
                <div class="mt-6 pt-6 border-t-2 border-bone-300">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Pengaturan</p>
                    <a href="#" class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-bone-200 transition-colors group">
                        <svg class="w-5 h-4 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="font-small">Pengaturan</span>
                    </a>
                </div>
            </nav>

            <!-- User Info & Logout -->
            <div class="px-4 py-4 border-t-2 border-bone-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-500 truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-gray-600 hover:text-red-600 hover:bg-bone-200 rounded-lg transition-colors" title="Logout">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            <!-- Top Bar -->
            <header class="bg-white border-b-2 border-bone-300 px-8 py-4 sticky top-0 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-2xl font-semibold text-black">@yield('page-subtitle', 'Selamat datang kembali!')</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:bg-bone-100 rounded-lg transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        
                        <!-- Pengingat Waktu -->
                        <div class="hidden md:block text-right">
                            <p class="text-xs text-gray-500">{{ now()->format('l') }}</p>
                            <p class="text-sm font-semibold text-black">{{ now()->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
