<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Income;
use Illuminate\Support\Facades\DB;

function monthNumberToName($month) {
    if ($month == '01'){
        return 'Jan';
    } elseif ($month == '02'){
        return 'Feb';
    } elseif ($month == '03'){
        return 'March';
    } elseif ($month == '04'){
        return 'April';
    } elseif ($month == '05') {
        return 'May';
    } elseif ($month == '06') {
        return 'June';
    } elseif ($month == '07') {
        return 'July';
    } elseif ($month == '08') {
        return 'Aug';
    } elseif ($month == '09') {
        return 'Sep';
    } elseif ($month == '10') {
        return 'Oct';
    } elseif ($month == '11') {
        return 'Nov';
    } else if ($month == '12') {
        return 'Dec';
    } else {
        return $month;
    }
}
class DashboardController extends Controller
{
    //
    public function dashboard() {
        if (Auth::user()){ 
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
            if (strlen($month) == 1) {
                $month = "0".$month;
            }
            $startingDate = $year."-".$month."-"."01";
            $endingDate = $year."-".$month."-"."28";
            // INCOME
            $incomes = DB::table("incomes")->whereRaw("created_at > NOW() - INTERVAL 1 MONTH AND userid = ?",[Auth::user()->id])->get();
            $totalIncome = 0;
            for ($i = 0; $i < count($incomes); $i++) {
                $totalIncome = $totalIncome + $incomes[$i]->amount;
            }
            // EXPENSES 
            $expenses = DB::table('expenses')->whereRaw('created_at > NOW() - INTERVAL 1 MONTH AND userid = ?',[Auth::user()->id])->get();
            $totalExpenses = 0;
            for ($i = 0; $i < count($expenses); $i++) {
                $totalExpenses = $totalExpenses + $expenses[$i]->amount;
            }
            // BILLS
            $bills = DB::table('bills')->whereRaw('created_at > NOW() - INTERVAL 1 MONTH AND userid = ?',[Auth::user()->id])->get();
            $totalBills = 0;
            for ($i = 0; $i < count($bills); $i++) {
                $totalBills = $totalBills + $bills[$i]->amount;
            }
            // DATES
            $now = Carbon::now();
            $nowMonth = $now->isoFormat('MM');
            $nowMonth = monthNumberToName($nowMonth);
            $nowYear = $now->isoFormat('Y');
            $nowDay = $now->isoFormat('d');
            $nowMinusOneMonth = Carbon::now()->sub(1,'month');
            $nowMinusOneMonthMonth = $nowMinusOneMonth->isoFormat('MM');
            $nowMinusOneMonthMonth = monthNumberToName($nowMinusOneMonthMonth);
            $nowMinusOneMonthYear = $nowMinusOneMonth->isoFormat('Y');
            $nowMinusOneMonthDay = $nowMinusOneMonth->isoFormat('d');
            $dates = [
                'nowMonth' => $nowMonth,
                'nowYear' => $nowYear,
                'nowDay' => $nowDay,
                'nowMinusOneMonthMonth' => $nowMinusOneMonthMonth,
                'nowMinusOneMonthYear' => $nowMinusOneMonthYear,
                'nowMinusOneMonthDay' => $nowMinusOneMonthDay,
            ];
            // LOG OF bills
            $loggedBills = DB::table('bills')->whereRaw('created_at > NOW() - INTERVAL 1 MONTH AND userid = ?',[Auth::user()->id])->take(3)->get();
            return view("dashboard",compact("totalIncome","totalExpenses","totalBills","dates","loggedBills"));
        } else {
            return view("login");
        }
    }

   
}
