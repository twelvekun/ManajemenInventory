@extends('layouts.app')

@section('page-title', 'Edit Produk')
@section('page-subtitle', 'Update informasi produk')

@section('content')
<div class="max-w-2xl">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('products.index') }}" class="inline-flex items-center text-gray-600 hover:text-black transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Daftar Produk
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl border-2 border-bone-300 p-8">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-black mb-2">Nama Produk *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                        class="input-field @error('name') border-red-500 @enderror"
                        placeholder="Masukkan nama produk">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-semibold text-black mb-2">Harga *</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-gray-500 font-medium">Rp</span>
                        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required min="0" step="0.01"
                            class="input-field pl-12 @error('price') border-red-500 @enderror"
                            placeholder="0">
                    </div>
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t-2 border-bone-300">
                <a href="{{ route('products.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    Update Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
