  b<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\EmployeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {    
    return view('welcome');
});

Auth::routes();

// Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group( function() {
    Route::view('access-room',        'accessroom')->name('accessroom');
    Route::view('users',            'users')->name('users');

    Route::get('export/pdf',   [EmployeController::class, 'exportPDF'])->name('exportpdf');

});