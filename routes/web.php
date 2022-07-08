<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{SuratMasukController,SuratKeluarController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::prefix('surat_masuk')->group(function () {
        Route::get('/', [SuratMasukController::class,'index'])->name('surat_masuk.index');
        Route::post('/store', [SuratMasukController::class,'store'])->name('surat_masuk.store');
        Route::post('/update/{id}', [SuratMasukController::class,'update'])->name('surat_masuk.update');
        Route::get('/delete/{id}', [SuratMasukController::class,'destroy'])->name('surat_masuk.delete');
        Route::get('/download/{id}', [SuratMasukController::class,'download'])->name('surat_masuk.download');
    });
    Route::prefix('surat_keluar')->group(function () {
        Route::get('/', [SuratKeluarController::class,'index'])->name('surat_keluar.index');
        Route::post('/store', [SuratKeluarController::class,'store'])->name('surat_keluar.store');
        Route::post('/update/{id}', [SuratKeluarController::class,'update'])->name('surat_keluar.update');
        Route::get('/delete/{id}', [SuratKeluarController::class,'destroy'])->name('surat_keluar.delete');
        Route::get('/download/{id}', [SuratKeluarController::class,'download'])->name('surat_keluar.download');
    });

});


Route::get('/cari-surat', function ()
{
    $data = DB::table('surat')->where('kode_surat','LIKE','%'.$_GET['search'].'%')->first();

    return view('cari-surat',['data'=>$data]);
})->name('cari-surat');
