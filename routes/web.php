<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiscalController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BillController;

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

Route::get('/', function () {
    return view('welcome');
})->name('main');

Auth::routes();

Route::resource('fiscals',FiscalController::class)->names('fiscals');

Route::resource('clients',ClientController::class)->names('clients');

Route::resource('bills',BillController::class)->names('bills');

Route::get('/clientFiscals/{client}',[ClientController::class,'clientFiscals'])->name('client.fiscals');

Route::post('/clientFiscals/{client}',[ClientController::class,'clientFiscalStore'])->name('client.fiscal.store');

Route::get('/clientContacts/{client}',[ClientController::class,'clientContacts'])->name('client.contacts');

Route::post('/clientContacts/{client}',[ClientController::class,'clientContactStore'])->name('client.contact.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
