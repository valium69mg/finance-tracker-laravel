<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Income;

class IncomeController extends Controller
{
    //
    public function getAddIncome() {
        $user=Auth::user();
        return view("add-income",compact("user"));
    }

    public function setIncome(Request $request) {
        // REQUEST BODY
        $userid = $request->userid;
        $amount = $request->amount;
        $concept = $request->concept;
        $category = $request->category;
        // CREATE NEW INCOME INSTANCE
        $income = new Income();
        $income->userid = $userid;
        $income->amount = $amount; 
        $income->concept = $concept;
        $income->category = $category;
        $income->save();
        return redirect()->back();
    }
}
