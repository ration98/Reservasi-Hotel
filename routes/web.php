<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('landing');
// });

Route::get('/', [LandingpageController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'Admin'], function(){
        route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

        //Tipe kamar
        Route::get('/admin/tipe_kmr/tipe', [AdminController::class, 'addTipe'])->name('admin.addTipe');
        Route::post('/admin/tipe_kmr/store', [AdminController::class, 'tipeStore'])->name('admin.tipeStore');
        Route::get('/admin/list/tipe_kmr', [AdminController::class, 'listTipe'])->name('admin.listTipe');
        Route::get('/admin/tipe/edit/{id}', [AdminController::class, 'editTipe'])->name('admin.editTipe');
        Route::get('/admin/tipe/hapus/{id}', [AdminController::class, 'hapusTipe'])->name('admin.hapusTipe');
        Route::patch('/admin/tipe/update/{id}', [AdminController::class, 'updateTipe'])->name('admin.updateTipe');

        //Kamar
        Route::get('/admin/kamar/kamar', [AdminController::class, 'addKamar'])->name('admin.addKamar');
        Route::post('/admin/kamar/store', [AdminController::class, 'kamarStore'])->name('admin.kamarStore');
        Route::get('/admin/list/kamar', [AdminController::class, 'listKamar'])->name('admin.listKamar');
        Route::get('/admin/kamar/edit/{id}', [AdminController::class, 'editKamar'])->name('admin.editKamar');
        Route::get('/admin/kamar/hapus/{id}', [AdminController::class, 'hapusKamar'])->name('admin.hapusKamar');
        Route::patch('/admin/kamar/update/{id}', [AdminController::class, 'updateKamar'])->name('admin.updateKamar');

        //Fasilitas
        Route::get('/admin/fasilitas/fasilitas', [AdminController::class, 'addFasilitas'])->name('admin.addFasilitas');
        Route::post('/admin/fasilitas/store', [AdminController::class, 'fasilitasStore'])->name('admin.fasilitasStore');
        Route::get('/admin/list/fasilitas', [AdminController::class, 'listFasilitas'])->name('admin.listFasilitas');
        Route::get('/admin/fasilitas/edit/{id}', [AdminController::class, 'editFasilitas'])->name('admin.editFasilitas');
        Route::get('/admin/fasilitas/hapus/{id}', [AdminController::class, 'hapusFasilitas'])->name('admin.hapusFasilitas');
        Route::patch('/admin/fasilitas/update/{id}', [AdminController::class, 'updateFasilitas'])->name('admin.updateFasilitas');

        //Fasilitas Kamar
        Route::get('/admin/fasilitas_kamar/FasilitasKamar', [AdminController::class, 'addFasilitasKamar'])->name('admin.addFasilitasKamar');
        Route::post('/admin/fasilitas_kamar/store', [AdminController::class, 'FasilitasKamarStore'])->name('admin.FasilitasKamarStore');
        Route::get('/admin/list/fasilitasKamar', [AdminController::class, 'listFasilitasKamar'])->name('admin.listFasilitasKamar');
        Route::get('/admin/fasilitas_kamar/edit/{id}', [AdminController::class, 'editFasilitasKamar'])->name('admin.editFasilitasKamar');
        Route::get('/admin/fasilitas_kamar/hapus/{id}', [AdminController::class, 'hapusFasilitasKamar'])->name('admin.hapusFasilitasKamar');
        Route::patch('/admin/fasilitas_kamar/update/{id}', [AdminController::class, 'updateFasilitasKamar'])->name('admin.updateFasilitasKamar');
    });

    Route::group(['middleware' => 'auth'], function(){
        Route::get('/resepsionis/home', [ResepsionisController::class, 'index'])->name('resepsionis.home');
    });

    Route::group(['middleware' => 'auth'], function(){
        Route::get('/customer/home', [CustomerController::class, 'index'])->name('customer.home');
        Route::post('/customer/data/store', [CustomerController::class, 'boking'])->name('customer.book.now');
        Route::post('/customer/dtPribadi/post', [CustomerController::class, 'dtPribadiPost'])->name('customer.dtPribadiPost');
        Route::get('/pembayaran', [CustomerController::class, 'pembayaran'])->name('customer.pembayaran');
        Route::get('/invoice', [CustomerController::class, 'invoice'])->name('customer.invoice');
        Route::get('/tarnsactions', [TransactionController::class, 'transactionList'])->name('customer.transactions');
        Route::get('/cacel/{id}', [TransactionController::class, 'transactionCancel'])->name('customer.invoice.cancel');
        Route::get('/proof/{id}', [TransactionController::class, 'transactionProof'])->name('customer.transaction.proof');
    });
});

Route::get('/guest/home', [GuestController::class, 'index'])->name('guest.home');
ROute::get('/guest/detailKamar/{id}', [GuestController::class, 'detail'])->name('guest.detail');
