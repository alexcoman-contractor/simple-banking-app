<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/branch/create', [BranchController::class, 'create'])->name('branch.create');
Route::post('/branch/store', [BranchController::class, 'store'])->name('branch.store');

Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');

Route::get('/report', [ReportController::class, 'show'])->name('report.show');

require __DIR__.'/auth.php';
