@extends('layouts.app')

@section('page-title', 'Detail Data Penjualan')
@section('page-subtitle', 'Informasi lengkap data penjualan')

@section('content')
<div class="max-w-3xl">
    <div class="mb-6">
        <a href="{{ route('sales.index') }}" class="inline-flex items-center text-gray-600 hover:text-black transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Data Penjualan
        </a>
    </div>

    <div class="bg-white rounded-xl border-2 border-bone-300 p-8">
        <div class="flex items-start justify-between mb-8">
            <div>
                <h2 class="text-3xl font-bold text-black mb-2">{{ $sale->product->name ?? 'N/A' }}</h2>
                <p class="text-sm text-gray-500">{{ $sale->sale_date->format('l, d F Y') }}</p>
                <p class="text-xs text-gray-400 mt-1">ID Penjualan: #{{ $sale->id }}</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-500 mb-1">Jumlah Terjual</p>
                <p class="text-4xl font-bold text-black">{{ number_format($sale->jumlah) }}</p>
                <p class="text-sm text-gray-500 mt-1">unit</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6 mb-8 pb-8 border-b-2 border-bone-200">
            <div>
                <p class="text-sm text-gray-500 mb-1">Harga Produk</p>
                <p class="text-base text-black font-medium">Rp {{ number_format($sale->product->price ?? 0, 0, ',', '.') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 mb-1">Total Nilai</p>
                <p class="text-base text-black font-medium">Rp {{ number_format(($sale->product->price ?? 0) * $sale->jumlah, 0, ',', '.') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 mb-1">Dibuat pada</p>
                <p class="text-base text-black font-medium">{{ $sale->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 mb-1">Terakhir diupdate</p>
                <p class="text-base text-black font-medium">{{ $sale->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            @can('edit-sales')
            <a href="{{ route('sales.edit', $sale) }}" class="btn-primary flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Data
            </a>
            @endcan
            
            @can('delete-sales')
            <form action="{{ route('sales.destroy', $sale) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-all flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Hapus Data
                </button>
            </form>
            @endcan
        </div>
    </div>
</div>
@endsection
