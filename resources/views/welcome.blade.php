<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="min-h-screen flex items-center justify-center p-6">
            <div class="max-w-2xl w-full">
                <div class="card">
                    <h1 class="text-4xl font-bold mb-4">Welcome to Laravel</h1>
                    <p class="text-gray-600 mb-6">
                        Project sudah dikonfigurasi dengan Tailwind CSS, Vite, Font Poppins, dan tema Black, White & Bone.
                    </p>
                    
                    <div class="flex gap-4">
                        <button class="btn-primary">
                            Primary Button
                        </button>
                        <button class="btn-secondary">
                            Secondary Button
                        </button>
                    </div>
                    
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-bone-200 border-2 border-bone-400 p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">Tailwind CSS</h3>
                            <p class="text-sm text-gray-600">Utility-first CSS framework</p>
                        </div>
                        <div class="bg-bone-200 border-2 border-bone-400 p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">Vite</h3>
                            <p class="text-sm text-gray-600">Fast build tool</p>
                        </div>
                        <div class="bg-black text-white p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">Poppins Font</h3>
                            <p class="text-sm text-bone-300">Modern & clean typography</p>
                        </div>
                        <div class="bg-white border-2 border-black p-4 rounded-lg">
                            <h3 class="font-semibold mb-2">Black & Bone Theme</h3>
                            <p class="text-sm text-gray-600">Elegant color scheme</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
