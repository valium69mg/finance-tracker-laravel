<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bills;
class BillsController extends Controller
{
    //
    public function getAddBill() {
        $user=Auth::user();
        return view("add-bill",compact("user"));
    }

    public function setBill(Request $request){
        // REQUEST BODY
        $userid = $request->userid;
        $amount = $request->amount;
        $concept = $request->concept;
        $category = $request->category;
        // CREATE NEW INCOME INSTANCE
        $bill = new Bills();
        $bill->userid = $userid;
        $bill->amount = $amount; 
        $bill->description = $concept;
        $bill->category = $category;
        $bill->save();
        return redirect()->back();
    }
}
