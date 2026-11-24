<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Katalog Barang') — Campus Lost &amp; Found</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:700i,900i|mulish:400,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@php
    $role = session('demo_role', 'guest'); // TODO: ganti dengan auth()->user()?->role
    $links = match ($role) {
        'mahasiswa' => [
            ['Dashboard', 'dashboard'], ['Laporan Barang', 'laporan.create'], ['Katalog Barang', 'katalog'],
            ['Klaim Barang', 'klaim.index'], ['Status Laporan', 'status.index'],
        ],
        'admin' => [['Dashboard', 'admin.dashboard'], ['Katalog Barang', 'katalog']],
        default => [['Katalog Barang', 'katalog'], ['Login', 'login'], ['Registrasi', 'register']],
    };
@endphp
<body class="flex min-h-screen flex-col antialiased">
    <header class="bg-navy text-white">
        <div class="mx-auto flex max-w-6xl flex-col gap-3 px-4 py-3 sm:flex-row sm:items-end sm:justify-between">
            <a href="{{ route('katalog') }}" class="block focus-visible:outline-2 focus-visible:outline-white">
                <span class="block font-display text-2xl font-black italic leading-none">Campus Lost &amp; Found</span>
                <span class="mt-1 block text-xs font-semibold">Sistem Informasi Barang Hilang dan Ditemukan</span>
            </a>
            <nav class="flex flex-wrap items-center gap-x-5 gap-y-1 font-display text-sm font-bold italic" aria-label="Navigasi utama">
                @foreach ($links as [$label, $route])
                    <a href="{{ route($route) }}" @class(['underline underline-offset-4' => request()->routeIs($route), 'hover:underline underline-offset-4'])>{{ $label }}</a>
                @endforeach
                @if ($role !== 'guest')
                    <form method="POST" action="{{ route('logout') }}">@csrf
                        <button class="font-display font-bold italic hover:underline underline-offset-4">Logout</button>
                    </form>
                @endif
            </nav>
        </div>
        <div class="h-3 bg-navy-soft"></div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8">
        @if (session('status'))
            <div class="mx-auto mb-6 max-w-3xl rounded-xl border border-green-300 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800" role="status">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-navy-soft py-3 text-center text-sm font-semibold text-white">Campus Lost &amp; Found</footer>
</body>
</html>
