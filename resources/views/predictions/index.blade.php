@extends('layouts.app')

@section('page-title', 'Prediksi Penjualan')
@section('page-subtitle', 'Analisis dan forecast penjualan 30 hari kedepan')

@section('content')
<!-- Admin Badge -->
<div class="mb-6">
    <span class="inline-flex items-center px-4 py-2 bg-green-100 border-2 border-green-500 text-green-700 rounded-lg text-sm font-semibold">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
        </svg>
        Regresi Linier
    </span>
</div>
@endsection