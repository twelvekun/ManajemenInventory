@extends('layouts.app')

@section('page-title', 'Manajemen Produk')
@section('page-subtitle', 'Kelola semua produk di toko Anda')

@section('content')
<!-- Success Message -->
@if(session('success'))
<div class="mb-6 bg-green-50 border-2 border-green-500 text-green-700 px-4 py-3 rounded-lg flex items-center justify-between">
    <div class="flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        <span>{{ session('success') }}</span>
    </div>
    <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
@endif

<!-- Header Actions -->
<div class="flex items-center justify-between mb-6">
    <div class="relative">
        <input type="text" placeholder="Cari produk..." class="pl-10 pr-4 py-2 border-2 border-bone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent">
        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
    </div>
    
    @can('create-products')
    <a href="{{ route('products.create') }}" class="btn-primary flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Produk
    </a>
    @endcan
</div>

<!-- Products Table -->
<div class="bg-white rounded-xl border-2 border-bone-300 overflow-hidden">
    <table class="w-full">
        <thead class="bg-bone-100 border-b-2 border-bone-300">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">No</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama Produk</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Harga</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-bone-200">
            @forelse($products as $index => $product)
            <tr class="hover:bg-bone-50 transition-colors">
                <td class="px-6 py-4">
                    <span class="text-sm text-gray-700">{{ $products->firstItem() + $index }}</span>
                </td>
                <td class="px-6 py-4">
                    <span class="text-sm font-semibold text-black">{{ $product->name }}</span>
                </td>
                <td class="px-6 py-4">
                    <span class="text-sm font-semibold text-black">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('products.show', $product) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Lihat">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                        @can('edit-products')
                        <a href="{{ route('products.edit', $product) }}" class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition-colors" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        @endcan
                        @can('delete-products')
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center">
                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <p class="text-gray-500 font-medium">Belum ada produk</p>
                        <p class="text-sm text-gray-400 mt-1">Tambahkan produk pertama Anda</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($products->hasPages())
<div class="mt-6">
    {{ $products->links() }}
</div>
@endif
@endsection
