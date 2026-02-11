<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    {{-- ========== NAVBAR UNTUK PELANGGAN & GUEST ========== --}}
    @if(!Auth::check() || Auth::user()->role === 'pelanggan')
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    {{-- Logo & Brand --}}
                    <div class="flex items-center">
                        <a href="{{ route('pelanggan.home') }}" class="text-2xl font-bold text-blue-600">
                            Toko Cihuy!
                        </a>
                    </div>

                    {{-- Menu Tengah (Opsional) --}}
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="{{ route('pelanggan.home') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>
                        <a href="{{ route('pelanggan.produk.index') }}" class="text-gray-700 hover:text-blue-600 font-medium">Katalog</a>
                        <a href="{{ route('pelanggan.riwayat') }}" class="text-gray-700 hover:text-blue-600 font-medium">Pesanan Saya</a>
                    </div>

                    {{-- Menu Kanan (Cart & User) --}}
                    <div class="flex items-center space-x-5">
                        {{-- Keranjang dengan Badge --}}
                        <a href="{{ route('pelanggan.cart.index') }}" class="relative text-gray-700 hover:text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            {{-- Badge Jumlah Item (Logikanya ambil dari Session Cart) --}}
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                                {{ session('cart') ? count(session('cart')) : 0 }}
                            </span>
                        </a>

                        @auth
                            <div class="flex items-center space-x-4 border-l pl-4">
                                <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-sm text-red-600 font-semibold">Logout</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    @endif
    {{-- ========== END NAVBAR ========== --}}
    <div class="min-h-screen flex">
        {{-- ========== SIDEBAR UNTUK ADMIN SAJA ========== --}}
        @if(Auth::check() && Auth::user()->role === 'admin')
            <aside class="w-64 bg-gray-900 text-gray-200 flex flex-col">

                <!-- Logo -->
                <div class="p-6 text-2xl font-bold text-white border-b border-gray-700">
                    Admin Panel
                </div>

                <!-- Menu -->
                <nav class="flex-1 p-4 space-y-1">

                    <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-2 rounded-lg
                            {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('produk.index') }}"
                    class="block px-4 py-2 rounded-lg
                            {{ request()->routeIs('produk.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }}">
                        Produk
                    </a>

                    <a href="{{ route('penjualan.index') }}"
                    class="block px-4 py-2 rounded-lg
                            {{ request()->routeIs('penjualan.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }}">
                        Penjualan
                    </a>

                    <a href="{{ route('karyawan.index') }}"
                    class="block px-4 py-2 rounded-lg
                            {{ request()->routeIs('karyawan.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700' }}">
                        Karyawan
                    </a>  
                </nav>

                {{-- LOGOUT BUTTON --}}
                <form method="POST" action="{{ route('logout') }}" class="mt-6">
                    @csrf
                    <button type="submit"
                            class="block w-full text-left px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold">
                        Logout
                    </button>
                </form>
            </aside>
        @endif
        {{-- ========== END SIDEBAR ========== --}}

        {{-- ========== MAIN CONTENT ========== --}}
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>

    </div>
</body>
</html>
