<?php

use App\Models\Unitkerja;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\SubkomisiController;
use App\Http\Controllers\UnitkerjaController;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LandingPageController::class, 'index', [
    'title' => 'Landing Page',
]])->name('landing.page');

Route::get('/login', [AuthController::class, 'login', [
    'title' => 'Login',
]])->name('login');

Route::get('/dashboard/master', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
    ]);
})->name('dashboard');

// MASTER DATA
Route::get('/dashboard/master/komisi', [KomisiController::class, 'index'])->name('komisi.index');
Route::post('/dashboard/master/komisi/store-or-update', [KomisiController::class, 'storeOrUpdate'])->name('komisi.storeOrUpdate');
Route::get('/dashboard/master/komisi/destroy/{id}', [KomisiController::class, 'destroy'])->name('komisi.destroy');

Route::get('/dashboard/master/subkomisi', [SubkomisiController::class, 'index'])->name('subkomisi.index');
Route::post('/dashboard/master/subkomisi/store-or-update', [SubkomisiController::class, 'storeOrUpdate'])->name('subkomisi.storeOrUpdate');
Route::get('/dashboard/master/subkomisi/destroy/{id}', [SubkomisiController::class, 'destroy'])->name('subkomisi.destroy');

Route::get('/dashboard/master/pangkat', [PangkatController::class, 'index'])->name('pangkat.index');
Route::post('/dashboard/master/pangkat/store-or-update', [PangkatController::class, 'storeOrUpdate'])->name('pangkat.storeOrUpdate');
Route::get('/dashboard/master/pangkat/destroy/{id}', [PangkatController::class, 'destroy'])->name('pangkat.destroy');

Route::get('/dashboard/master/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
Route::post('/dashboard/master/jabatan/store-or-update', [JabatanController::class, 'storeOrUpdate'])->name('jabatan.storeOrUpdate');
Route::get('/dashboard/master/jabatan/destroy/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

Route::get('/dashboard/master/unit-kerja', [UnitkerjaController::class, 'index'])->name('unit-kerja.index');
Route::post('/dashboard/master/unit-kerja/store-or-update', [UnitkerjaController::class, 'storeOrUpdate'])->name('unit-kerja.storeOrUpdate');
Route::get('/dashboard/master/unit-kerja/destroy/{id}', [UnitkerjaController::class, 'destroy'])->name('unit-kerja.destroy');


Route::get('/dashboard/pegawai', function () {
    return view('pegawai.layouts.index', [
        'title' => 'Pegawai',
    ]);
})->name('pegawai.index');

Route::get('/dashboard/pegawai/detail/pengaturan-akun', function () {
    return view('pegawai.pengaturan-akun', [
        'title' => 'Pengaturan Akun',
    ]);
})->name('pegawai.pengaturan-akun');

Route::get('/dashboard/pegawai/detail/informasi-pribadi', function () {
    return view('pegawai.informasi-pribadi', [
        'title' => 'Informasi Pribadi',
    ]);
})->name('pegawai.informasi-pribadi');

Route::get('/dashboard/pegawai/detail/pendidikan', function () {
    return view('pegawai.pendidikan', [
        'title' => 'Pendidikan',
    ]);
})->name('pegawai.pendidikan');

Route::get('/dashboard/pegawai/detail/keluarga', function () {
    return view('pegawai.keluarga', [
        'title' => 'Keluarga',
    ]);
})->name('pegawai.keluarga');

Route::get('/dashboard/pegawai/detail/jaminan', function () {
    return view('pegawai.jaminan', [
        'title' => 'Jaminan',
    ]);
})->name('pegawai.jaminan');

// CUTI
Route::get('/dashboard/cuti/pengajuan', function () {
    return view('cuti.pengajuan', [
        'title' => 'Pengajuan Cuti',
    ]);
})->name('cuti.pengajuan');
Route::get('/dashboard/cuti/pending', function () {
    return view('cuti.pending', [
        'title' => 'Cuti Pending',
    ]);
})->name('cuti.pending');
Route::get('/dashboard/cuti/pending/detail', function () {
    return view('cuti.detail-pending', [
        'title' => 'Detail Cuti Pending',
    ]);
})->name('cuti.pending.detail');
Route::get('/dashboard/cuti/disetujui', function () {
    return view('cuti.disetujui', [
        'title' => 'Cuti Disetujui',
    ]);
})->name('cuti.disetujui');
Route::get('/dashboard/cuti/ditolak', function () {
    return view('cuti.ditolak', [
        'title' => 'Cuti Ditolak',
    ]);
})->name('cuti.ditolak');

// IZIN TERLAMBAT
Route::get('/dashboard/izin/pengajuan', function () {
    return view('izin.pengajuan', [
        'title' => 'Pengajuan Izin Terlambat',
    ]);
})->name('izin.pengajuan');
Route::get('/dashboard/izin/terlambat', function () {
    return view('izin.terlambat', [
        'title' => 'Izin Terlambat',
    ]);
})->name('izin.terlambat');
Route::get('/dashboard/izin/terlambat/pending', function () {
    return view('izin.layout.terlambat-pending', [
        'title' => 'Izin Terlambat Pending',
    ]);
})->name('izin.terlambat.pending');
Route::get('/dashboard/izin/terlambat/disetujui', function () {
    return view('izin.layout.terlambat-disetujui', [
        'title' => 'Izin Terlambat Disetujui',
    ]);
})->name('izin.terlambat.disetujui');
Route::get('/dashboard/izin/terlambat/ditolak', function () {
    return view('izin.layout.terlambat-ditolak', [
        'title' => 'Izin Terlambat Ditolak',
    ]);
})->name('izin.terlambat.ditolak');

// IZIN PULANG
Route::get('/dashboard/izin/pulang', function () {
    return view('izin.pulang', [
        'title' => 'Izin Pulang',
    ]);
})->name('izin.pulang');
Route::get('/dashboard/izin/pulang/pending', function () {
    return view('izin.layout.pulang-pending', [
        'title' => 'Izin Pulang Pending',
    ]);
})->name('izin.pulang.pending');
Route::get('/dashboard/izin/pulang/pending/detail', function () {
    return view('izin.detail-pending', [
        'title' => 'Detail Izin Pulang Pending',
    ]);
})->name('izin.pulang.pending.detail');
Route::get('/dashboard/izin/pulang/disetujui', function () {
    return view('izin.layout.pulang-disetujui', [
        'title' => 'Izin Pulang Disetujui',
    ]);
})->name('izin.pulang.pending.disetujui');
Route::get('/dashboard/izin/pulang/ditolak', function () {
    return view('izin.layout.pulang-ditolak', [
        'title' => 'Izin Pulang Ditolak',
    ]);
})->name('izin.pulang.pending.ditolak');

// LUPA REKAM ABSEN DATANG
Route::get('/dashboard/lupa-rekam/pengajuan', function () {
    return view('lupa-rekam-kehadiran.pengajuan', [
        'title' => 'Lupa Rekam Absen Datang',
    ]);
})->name('lupa-rekam.pengajuan');
Route::get('/dashboard/lupa-rekam/datang', function () {
    return view('lupa-rekam-kehadiran.datang', [
        'title' => 'Lupa Rekam Absen Datang',
    ]);
})->name('lupa-rekam.datang');
Route::get('/dashboard/lupa-rekam/datang/pending', function () {
    return view('lupa-rekam-kehadiran.layout.datang-pending', [
        'title' => 'Lupa Rekam Absen Datang Pending',
    ]);
})->name('lupa-rekam.datang.pending');
Route::get('/dashboard/lupa-rekam/datang/disetujui', function () {
    return view('lupa-rekam-kehadiran.layout.datang-disetujui', [
        'title' => 'Lupa Rekam Absen Datang Disetujui',
    ]);
})->name('lupa-rekam.datang.disetujui');
Route::get('/dashboard/lupa-rekam/datang/ditolak', function () {
    return view('lupa-rekam-kehadiran.layout.datang-ditolak', [
        'title' => 'Lupa Rekam Absen Datang Ditolak',
    ]);
})->name('lupa-rekam.datang.ditolak');

// LUPA REKAM ABSEN PULANG
Route::get('/dashboard/lupa-rekam/pulang', function () {
    return view('lupa-rekam-kehadiran.pulang', [
        'title' => 'Lupa Rekam Absen Pulang',
    ]);
})->name('lupa-rekam.pulang');
Route::get('/dashboard/lupa-rekam/pulang/detail', function () {
    return view('lupa-rekam-kehadiran.detail', [
        'title' => 'Detail Lupa Rekam Absen Pulang',
    ]);
})->name('lupa-rekam.pulang.detail');

// PROFILING
Route::get('/dashboard/profiling', function () {
    return view('profiling.index', [
        'title' => 'Profiling',
    ]);
})->name('profiling.index');
Route::get('/dashboard/profiling/detail', function () {
    return view('profiling.detail', [
        'title' => 'Detail Profiling',
    ]);
})->name('profiling.detail');


// USER ROUTE
Route::get('/pegawai/home', function () {
    return view('dashboard-user.dashboard');
})->name('user.home');

Route::get('/pegawai/cuti', function () {
    return view('dashboard-user.cuti.index');
})->name('user.cuti.index');
Route::get('/pegawai/cuti/detail', function () {
    return view('dashboard-user.cuti.detail');
})->name('user.cuti.detail');
Route::get('/pegawai/cuti/setujui', function () {
    return view('dashboard-user.cuti.setujui');
})->name('user.cuti.setujui');
Route::get('/pegawai/cuti/setujui/detail', function () {
    return view('dashboard-user.cuti.setujui-detail');
})->name('user.cuti.setujui.detail');

Route::get('/pegawai/izin', function () {
    return view('dashboard-user.izin.index');
})->name('user.izin.index');
Route::get('/pegawai/izin/detail', function () {
    return view('dashboard-user.izin.detail');
})->name('user.izin.detail');
Route::get('/pegawai/izin/setujui', function () {
    return view('dashboard-user.izin.setujui');
})->name('user.izin.setujui');
Route::get('/pegawai/izin/setujui/detail', function () {
    return view('dashboard-user.izin.setujui-detail');
})->name('user.izin.setujui.detail');

Route::get('/pegawai/lupa-rekam', function () {
    return view('dashboard-user.lupa-rekam.index');
})->name('user.lupa-rekam.index');
Route::get('/pegawai/lupa-rekam/detail', function () {
    return view('dashboard-user.lupa-rekam.detail');
})->name('user.lupa-rekam.detail');
// Route::get('/pegawai/lupa/setujui', function () {
//     return view('dashboard-user.lupa.setujui');
// })->name('user.lupa.setujui');
// Route::get('/pegawai/lupa/setujui/detail', function () {
//     return view('dashboard-user.lupa.setujui-detail');
// })->name('user.lupa.setujui.detail');


