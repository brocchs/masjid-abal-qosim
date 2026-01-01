<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonaturReportController;
use App\Http\Controllers\CashFlowReportController;
use App\Http\Controllers\PublicController;

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

// Public Landing Page
Route::get('/', [PublicController::class, 'index'])->name('landing');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('cash-flow.index');
    });
    
    Route::resource('cash-flow', CashFlowController::class);
    Route::resource('cashflow-reports', CashFlowReportController::class)->only(['index']);
    Route::resource('users', UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('zakat', App\Http\Controllers\ZakatController::class);
    Route::resource('zakat-maal', App\Http\Controllers\ZakatMaalController::class);
    Route::resource('shodaqoh', App\Http\Controllers\ShodaqohController::class);
    Route::resource('donasi', App\Http\Controllers\DonasiController::class);
    Route::resource('wakaf', App\Http\Controllers\WakafController::class);
    Route::resource('penerima-bantuan', App\Http\Controllers\PenerimaBantuanController::class);
    Route::resource('penyaluran', App\Http\Controllers\PenyaluranController::class);
    
    // Laporan
    Route::get('/reports/donatur', [DonaturReportController::class, 'index'])->name('reports.donatur');
    Route::get('/reports/donatur/{nama}', [DonaturReportController::class, 'detail'])->name('reports.donatur.detail');
    Route::get('/reports/penyaluran', [App\Http\Controllers\PenyaluranReportController::class, 'index'])->name('reports.penyaluran');
});
