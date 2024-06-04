<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\BillsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/addIncome',[IncomeController::class,'getAddIncome'])->name('addIncome');
    Route::get('/addExpense',[ExpensesController::class,'getAddExpense'])->name('addExpense');
    Route::get('/addBill',[BillsController::class,'getAddBill'])->name('addBill');
    Route::post('/setIncome',[IncomeController::class,'setIncome'])->name('setIncome');
    Route::post('/setExpense',[ExpensesController::class,'setExpense'])->name('setExpense');
    Route::post('/setBill',[BillsController::class,'setBill'])->name('setBill');
});


require __DIR__.'/auth.php';
