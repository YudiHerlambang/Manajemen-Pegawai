<?php

use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pegawai', function () {
    return view('pegawai');
});

// Route::get('/pegawai/detail/{nama}', function ($nama) {
//     return "Nama pegawai ini adalah : $nama";
// });

Route::get('/pegawai/detail/{nama?}', function ( ?string $nama = null) {
    return "Nama pegawai ini adalah : $nama";
});

Route::get('/pegawai/cek_absensi/januari', function () {
    return "Absensi pegawai pada bulan januari";
})->name('cek_absensi');

Route::get('/test', function () {
    return redirect()->route('cek_absensi');
});

Route::get('/coba_query', function () {
    // $pegawai = Pegawai::all();
    // dd($pegawai->toArray());

    // $pegawai = Pegawai::find(50);
    // $pegawai = Pegawai::where('nama_pegawai', "Galih Hardiansyah")->first();

    // $pegawai = Pegawai::where('umur', '>', 25)->get();
    // dd($pegawai->toArray());

    // Pegawai::where('nama_pegawai', 'Hesti Aryani')->delete();

    Pegawai::destroy(31);
});

Route::fallback(function () {
    return view('404');
});