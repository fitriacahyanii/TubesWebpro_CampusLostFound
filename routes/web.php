<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONTEND ONLY — data & auth di bawah ini hanya DUMMY
|--------------------------------------------------------------------------
| Ganti closure dengan Controller + Model saat backend siap.
| Login dummy: email berawalan "admin" => role admin, selain itu mahasiswa.
*/

function demoItems(): array
{
    return [
        ['id' => 1, 'nama' => 'Kartu Mahasiswa', 'tipe' => 'ditemukan', 'kategori' => 'Dokumen atau Kartu', 'lokasi' => 'Area Kantin', 'tanggal' => '21 Oktober 2026', 'deskripsi' => 'Kartu mahasiswa ditemukan di meja area kantin.'],
        ['id' => 2, 'nama' => 'Payung Biru', 'tipe' => 'ditemukan', 'kategori' => 'Barang Pribadi', 'lokasi' => 'Gedung Fakultas Informatika', 'tanggal' => '18 Oktober 2026', 'deskripsi' => 'Payung lipat warna biru tua.'],
        ['id' => 3, 'nama' => 'Botol Minum Hijau', 'tipe' => 'ditemukan', 'kategori' => 'Barang Pribadi', 'lokasi' => 'Perpustakaan', 'tanggal' => '15 Oktober 2026', 'deskripsi' => 'Botol minum hijau, tertinggal di rak baca.'],
        ['id' => 4, 'nama' => 'Dompet Hitam', 'tipe' => 'hilang', 'kategori' => 'Barang Pribadi', 'lokasi' => 'Perpustakaan', 'tanggal' => '22 Oktober 2026', 'deskripsi' => 'Dompet kulit hitam, hilang di sekitar perpustakaan.'],
        ['id' => 5, 'nama' => 'Tas Hitam', 'tipe' => 'ditemukan', 'kategori' => 'Barang Pribadi', 'lokasi' => 'Gedung Fakultas Informatika', 'tanggal' => '17 Oktober 2026', 'deskripsi' => 'Tas ransel hitam tanpa nama.'],
        ['id' => 6, 'nama' => 'Charger Labtop', 'tipe' => 'hilang', 'kategori' => 'Elektronik', 'lokasi' => 'Ruang Kelas', 'tanggal' => '23 Oktober 2026', 'deskripsi' => 'Charger laptop 65W, kabel agak kusut.'],
    ];
}

Route::get('/', fn () => redirect()->route('katalog'));

/* ---------- Katalog (publik) ---------- */
Route::get('/katalog', function (Request $r) {
    $items = collect(demoItems())
        ->when($r->nama, fn ($c, $v) => $c->filter(fn ($i) => str_contains(strtolower($i['nama']), strtolower($v))))
        ->when($r->kategori, fn ($c, $v) => $c->where('kategori', $v))
        ->when($r->lokasi, fn ($c, $v) => $c->filter(fn ($i) => str_contains(strtolower($i['lokasi']), strtolower($v))))
        ->when($r->status, fn ($c, $v) => $c->where('tipe', $v))
        ->values();

    return view('items.index', ['items' => $items, 'total' => count(demoItems())]);
})->name('katalog');

Route::get('/katalog/{id}', function ($id) {
    $item = collect(demoItems())->firstWhere('id', (int) $id) ?? abort(404);
    return view('items.show', compact('item'));
})->name('katalog.show');

/* ---------- Auth (dummy) ---------- */
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', function (Request $r) {
    $role = str_starts_with(strtolower($r->email ?? ''), 'admin') ? 'admin' : 'mahasiswa';
    session(['demo_role' => $role, 'demo_name' => $role === 'admin' ? 'Admin Kampus' : 'Mahasiswa']);
    return redirect()->route($role === 'admin' ? 'admin.dashboard' : 'dashboard');
})->name('login.post');

Route::view('/registrasi', 'auth.register')->name('register');
Route::post('/registrasi', fn () => redirect()->route('login')->with('status', 'Akun berhasil dibuat. Silakan masuk.'))->name('register.post');

Route::post('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');

/* ---------- Area mahasiswa ---------- */
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/laporan', 'items.create')->name('laporan.create');
Route::post('/laporan', fn () => redirect()->route('status.index')->with('status', 'Laporan terkirim dan menunggu verifikasi admin.'))->name('laporan.store');

Route::get('/klaim', fn () => view('claims.index'))->name('klaim.index');
Route::get('/klaim/ajukan/{id}', function ($id) {
    $item = collect(demoItems())->firstWhere('id', (int) $id) ?? abort(404);
    return view('claims.create', compact('item'));
})->name('klaim.create');
Route::post('/klaim', fn () => redirect()->route('klaim.index')->with('status', 'Klaim terkirim dan menunggu pemeriksaan admin.'))->name('klaim.store');

Route::view('/status-laporan', 'reports.status')->name('status.index');

/* ---------- Area admin ---------- */
Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');
