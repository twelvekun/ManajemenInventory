@extends('layouts.app')

@section('page-title', 'Tambah Data Penjualan')
@section('page-subtitle', 'Tambahkan data penjualan baru')

@section('content')
<div class="max-w-2xl">
    <div class="mb-6">
        <a href="{{ route('sales.index') }}" class="inline-flex items-center text-gray-600 hover:text-black transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Data Penjualan
        </a>
    </div>

    <div class="bg-white rounded-xl border-2 border-bone-300 p-8">
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            
            <div class="space-y-6">
                <div>
                    <label for="product_id" class="block text-sm font-semibold text-black mb-2">Produk *</label>
                    <select id="product_id" name="product_id" required
                        class="input-field @error('product_id') border-red-500 @enderror">
                        <option value="">Pilih Produk</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="sale_date" class="block text-sm font-semibold text-black mb-2">Tanggal Penjualan *</label>
                    <input type="date" id="sale_date" name="sale_date" value="{{ old('sale_date', date('Y-m-d')) }}" required
                        class="input-field @error('sale_date') border-red-500 @enderror">
                    @error('sale_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jumlah" class="block text-sm font-semibold text-black mb-2">Jumlah Barang *</label>
                    <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required min="1"
                        class="input-field @error('jumlah') border-red-500 @enderror"
                        placeholder="0">
                    @error('jumlah')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t-2 border-bone-300">
                <a href="{{ route('sales.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
