@extends('layouts.app')
@section('title', 'Login')
@section('content')
<x-page-title title="Login Akun" subtitle="Silakan masuk untuk mengakses sistem." />
<form method="POST" action="{{ route('login.post') }}" class="panel mx-auto max-w-md space-y-4">
    @csrf
    <h2 class="text-lg">Masuk ke Akun</h2>
    <x-field label="Email" name="email" type="email" placeholder="Masukkan email" />
    <x-field label="Password" name="password" type="password" placeholder="Masukkan password" />
    <button class="btn-primary w-full">Login</button>
    <p class="text-center text-sm">Belum punya akun? <a href="{{ route('register') }}" class="font-bold underline">Daftar sekarang</a></p>
</form>
@endsection
