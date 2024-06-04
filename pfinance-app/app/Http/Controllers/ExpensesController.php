<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expenses;

class ExpensesController extends Controller
{
    //
    public function getAddExpense(){
        $user=Auth::user();
        return view("add-expense",compact("user"));
    }

    public function setExpense(Request $request){
        // REQUEST BODY
        $userid = $request->userid;
        $amount = $request->amount;
        $concept = $request->concept;
        $category = $request->category;
        // CREATE NEW INCOME INSTANCE
        $expense= new Expenses();
        $expense->userid = $userid;
        $expense->amount = $amount; 
        $expense->concept = $concept;
        $expense->category = $category;
        $expense->save();
        return redirect()->back();
    }

    public function showExpenses(){ 
        $user=Auth::user();
        if ($user) {
            $expenses = Expenses::where("userid",$user->id)->get();
            return view("show-expenses",compact("expenses"));
        } else {
            return redirect('login');
        }
    }
}
