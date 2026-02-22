@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Selamat datang, ' . $user->name . '!')

@section('content')
<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    @can('view-products')
    <div class="bg-white rounded-xl border-2 border-bone-300 p-6 hover:shadow-lg transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-blue-100 rounded-lg">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
        </div>
        <h3 class="text-gray-600 text-sm font-medium mb-1">Total Produk</h3>
        <p class="text-3xl font-bold text-black">{{ $totalProducts }}</p>
        <p class="text-xs text-gray-500 mt-2">Produk terdaftar</p>
    </div>
    @endcan

    @can('view-sales')
    <div class="bg-white rounded-xl border-2 border-bone-300 p-6 hover:shadow-lg transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-green-100 rounded-lg">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>
        <h3 class="text-gray-600 text-sm font-medium mb-1">Penjualan Hari Ini</h3>
        <p class="text-3xl font-bold text-black">{{ number_format($totalSalesToday) }}</p>
        <p class="text-xs text-gray-500 mt-2">Unit terjual hari ini</p>
    </div>
    @endcan

    @can('view-overall-data')
    <div class="bg-white rounded-xl border-2 border-bone-300 p-6 hover:shadow-lg transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-purple-100 rounded-lg">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </div>
        <h3 class="text-gray-600 text-sm font-medium mb-1">Total Penjualan</h3>
        <p class="text-3xl font-bold text-black">{{ $totalSalesThisMonth }}</p>
        <p class="text-xs text-gray-500 mt-2">Transaksi bulan ini</p>
    </div>
    @endcan

    @can('view-predictions')
    <a href="{{ route('predictions.index') }}" class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl border-2 border-orange-400 p-6 hover:shadow-lg transition-all hover:-translate-y-1 group">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-white/20 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
            <svg class="w-5 h-5 text-white group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
        <h3 class="text-white text-sm font-medium mb-1">Lihat Hasil Prediksi</h3>
        <p class="text-3xl font-bold text-white">Forecast</p>
        <p class="text-xs text-white/80 mt-2">Analisis penjualan kedepan</p>
    </a>
    @endcan
</div>

<!-- Charts & Analytics -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Sales Chart -->
    <div class="lg:col-span-2 bg-white rounded-xl border-2 border-bone-300 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg font-bold text-black">Grafik Penjualan</h2>
                <p class="text-sm text-gray-500">Data penjualan terbaru</p>
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-xs font-semibold bg-black text-white rounded-lg">7 Hari</button>
                <button class="px-3 py-1 text-xs font-semibold text-gray-600 hover:bg-bone-100 rounded-lg">30 Hari</button>
                <button class="px-3 py-1 text-xs font-semibold text-gray-600 hover:bg-bone-100 rounded-lg">1 Tahun</button>
            </div>
        </div>
        <div class="h-64 bg-bone-100 rounded-lg flex items-center justify-center border-2 border-bone-300">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <p class="text-gray-500 font-medium">Chart akan ditampilkan di sini</p>
                <p class="text-sm text-gray-400 mt-1">Integrasi dengan library charting</p>
            </div>
        </div>
    </div>

    <!-- Top Products -->
    <div class="bg-white rounded-xl border-2 border-bone-300 p-6">
        <h2 class="text-lg font-bold text-black mb-4">Produk Terbaru</h2>
        <div class="space-y-4">
            @forelse($topProducts as $product)
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-bone-200 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-black">{{ Str::limit($product->name, 20) }}</p>
                        <p class="text-xs text-gray-500">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <p class="text-sm text-gray-500">Belum ada produk</p>
            </div>
            @endforelse
        </div>
        @if($topProducts->count() > 0)
        <a href="{{ route('products.index') }}" class="mt-4 block text-center text-sm font-semibold text-black hover:underline">
            Lihat Semua Produk →
        </a>
        @endif
    </div>
</div>

<!-- Quick Actions & Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Quick Actions -->
    <div class="bg-white rounded-xl border-2 border-bone-300 p-6">
        <h2 class="text-lg font-bold text-black mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 gap-3">
            @can('create-products')
            <a href="{{ route('products.create') }}" class="p-4 bg-bone-100 hover:bg-bone-200 border-2 border-bone-300 hover:border-black rounded-lg transition-all text-left group">
                <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-sm text-black">Tambah Produk</h3>
                <p class="text-xs text-gray-500 mt-1">Produk baru</p>
            </a>
            @endcan

            @can('create-sales')
            <a href="{{ route('sales.create') }}" class="p-4 bg-bone-100 hover:bg-bone-200 border-2 border-bone-300 hover:border-black rounded-lg transition-all text-left group">
                <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-sm text-black">Transaksi Baru</h3>
                <p class="text-xs text-gray-500 mt-1">Buat penjualan</p>
            </a>
            @endcan

            @can('view-products')
            <a href="{{ route('products.index') }}" class="p-4 bg-bone-100 hover:bg-bone-200 border-2 border-bone-300 hover:border-black rounded-lg transition-all text-left group">
                <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-sm text-black">Lihat Produk</h3>
                <p class="text-xs text-gray-500 mt-1">Kelola produk</p>
            </a>
            @endcan

            @can('view-predictions')
            <a href="{{ route('predictions.index') }}" class="p-4 bg-orange-500 text-white hover:bg-orange-600 rounded-lg transition-all text-left group">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-sm">Prediksi</h3>
                <p class="text-xs text-white/80 mt-1">Forecast penjualan</p>
            </a>
            @endcan
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl border-2 border-bone-300 p-6">
        <h2 class="text-lg font-bold text-black mb-4">Aktivitas Terbaru</h2>
        <div class="space-y-4">
            @forelse($recentSales as $sale)
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-black">
                        <span class="font-semibold">Penjualan #{{ $sale->id }}</span> - {{ $sale->jumlah }} unit
                    </p>
                    <p class="text-xs text-gray-500">{{ $sale->sale_date->format('d M Y') }} • {{ $sale->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                <p class="text-sm text-gray-500">Belum ada aktivitas</p>
            </div>
            @endforelse
        </div>
        @if($recentSales->count() > 0)
        <a href="{{ route('sales.index') }}" class="mt-4 block text-center text-sm font-semibold text-black hover:underline">
            Lihat Semua Penjualan →
        </a>
        @endif
    </div>
</div>
@endsection
