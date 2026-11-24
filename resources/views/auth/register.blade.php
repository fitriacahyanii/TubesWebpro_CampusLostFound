@extends('layouts.app')
@section('title', 'Registrasi')
@section('content')
<x-page-title title="Registrasi Akun" subtitle="Buat akun untuk menggunakan sistem" />
<form method="POST" action="{{ route('register.post') }}" class="panel mx-auto max-w-lg space-y-4">
    @csrf
    <h2 class="text-lg">Formulir registrasi</h2>
    <x-field label="Nama Lengkap" name="name" placeholder="Masukkan nama lengkap" />
    <x-field label="NIM" name="nim" placeholder="Masukkan NIM" />
    <x-field label="Email" name="email" type="email" placeholder="Masukkan email" />
    <x-field label="Password" name="password" type="password" placeholder="Masukkan password" />
    <x-field label="Konfirmasi Password" name="password_confirmation" type="password" placeholder="Masukkan ulang password" />
    <x-select label="Role Akun" name="role" placeholder="Pilih role" :options="['mahasiswa' => 'Mahasiswa', 'admin' => 'Admin']" />
    <button class="btn-primary w-full">Daftar</button>
    <p class="text-center text-sm">Sudah memiliki akun? <a href="{{ route('login') }}" class="font-bold underline">Login sekarang</a></p>
</form>
@endsection
