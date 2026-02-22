<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Hadrah Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen flex">
        <!-- Tampilan Kiri-->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="max-w-md w-full">
                <!-- Login Form -->
                <div class="mb-6">
                    <h2 class="text-3xl font-bold mb-2">Selamat Datang</h2>
                    <p class="text-gray-600">Silakan login terlebih dahulu untuk mengakses Manajemen Inventory </p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 border-2 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required 
                            autofocus
                            class="input-field"
                            placeholder="Masukkan email Anda"
                        >
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold mb-2">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="input-field"
                            placeholder="Masukkan password Anda"
                        >
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-2 border-black text-black focus:ring-black">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>
                        <a href="#" class="text-sm font-semibold text-black hover:underline">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn-primary w-full text-base py-3">
                        Login
                    </button>
                </form>

                <!-- HAK CIPTA -->
                <div class="mt-8 p-4 bg-bone-100 border-2 border-bone-300 rounded-lg">
                    <p class="text-xs font-semibold text-gray-700 mb-2">Perhatian:</p>
                    <div class="space-y-2 text-xs text-gray-600">
                        <p><span class="text-black">Manajemen Inventory ini dibuat untuk memudahkan pengguna UMKM untuk mengelola bisnis skala kecil</span></p>
                        <p><span class="font-semibold text-black">Segala sesuatu Tindakan yang Ilegal akan dikenakan Hukum  sesuia dengan Undang Undang yang Berlaku</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tampilan Kanan -->
        <div class="hidden lg:flex lg:w-1/2 bg-white items-center justify-center p-12 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-bone-700 rounded-full opacity-10 -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-bone-600 rounded-full opacity-10 -ml-48 -mb-48"></div>
            
            <!-- Content -->
            <div class="relative z-10 text-center max-w-lg">
                <!-- Illustration Placeholder -->
                <div class="mb-8">
                    <img src="{{ asset('img/login.png') }}" class="w-full h-64 object-contain" alt="Logo Universitas Islam Lamongan">
                    </img>
                </div>
                <h2 class="text-3xl font-bold mb-4">
                    Hadrah Store Lamongan
                </h2>
                <p class="text-neutral-800 text-lg mb-6">
                    Sistem ini adalah Manajemen Inventory resmi dari toko Hadrah Store Lamongan dengan fitur prediksi penjualan, laporan lengkap, dan role-based access control.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
