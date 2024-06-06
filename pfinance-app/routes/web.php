<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\BillsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // INCOMES
    Route::get('/addIncome',[IncomeController::class,'getAddIncome'])->name('addIncome');
    Route::post('/setIncome',[IncomeController::class,'setIncome'])->name('setIncome');
    Route::get('/showIncome',[IncomeController::class,'showIncome'])->name('showIncome');
    // EXPENSES
    Route::get('/addExpense',[ExpensesController::class,'getAddExpense'])->name('addExpense'); 
    Route::post('/setExpense',[ExpensesController::class,'setExpense'])->name('setExpense');
    Route::get('/showExpenses',[ExpensesController::class,'showExpenses'])->name('showExpenses');

    // BILLS
    Route::get('/addBill',[BillsController::class,'getAddBill'])->name('addBill');
    Route::post('/setBill',[BillsController::class,'setBill'])->name('setBill');
    Route::get('/showBills',[BillsController::class,'showBills'])->name('showBills');
    
});


require __DIR__.'/auth.php';
