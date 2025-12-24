<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SensorMax30100Controller;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PerkiraanController;
use App\Http\Controllers\IoTController;

use App\Models\Dht11_model;

use Illuminate\Support\Facades\Route;
Route::get('/', [HomeController::class, 'index']); // Rute untuk halaman utama
Route::get('/sensor', [SensorController::class, 'index'])->name('sensor'); // Rute untuk halaman utama
Route::get('/data', [SensorController::class, 'getData'])->name('data.sensor'); // Rute untuk mengambil data

Route::resource('siswas', SiswaController::class);
Route::resource('sensormax30100', SensorMax30100Controller::class);

Route::resource('gallery', GalleryController::class);

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/tambah', [SiswaController::class, 'tambah'])->name('siswa.tambah');
Route::post('/siswa/tambah', [SiswaController::class, 'tambah_proses'])->name('siswa.tambah_proses');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/edit/{id}', [SiswaController::class, 'edit_proses'])->name('siswa.edit_proses');
Route::get('/siswa/hapus/{id}', [SiswaController::class, 'hapus'])->name('siswa.hapus');
Route::delete('/siswa/hapus/{id}', [SiswaController::class, 'hapus_proses'])->name('siswa.hapus_proses');
Route::get('cetak_siswa', [SiswaController::class, 'cetak_siswa'])->name('cetak_siswa');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');


// Route::resource('guru', GuruController::class);
Route::get('guru', [GuruController::class, 'index']);
Route::post('guru', [GuruController::class, 'store']);
Route::get('guru/{id}', [GuruController::class, 'show']);
Route::put('guru/{id}', [GuruController::class, 'update']);
Route::delete('guru/{id}', [GuruController::class, 'destroy']);

//other way route
Route::resource('pelajaran', PelajaranController::class);

Route::resource('kurikulum', KurikulumController::class);

Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

Route::resource('perkiraan', PerkiraanController::class);
Route::get('cetak_perkiraan', [PerkiraanController::class, 'cetak_perkiraan'])->name('cetak_perkiraan');



Route::resource('hari', HariController::class);

Route::resource('pengumuman', PengumumanController::class);

Route::resource('nilai', NilaiController::class);

Route::resource('order', OrderController::class);




// -----------------------------
// IoT Monitoring Dashboard
// -----------------------------
Route::get('/iot/monitoring', [IoTController::class, 'index'])->name('iot.monitoring');
Route::get('/iot/test-api', [IoTController::class, 'testAPI'])->name('iot.test-api'); // Halaman test API lokal

