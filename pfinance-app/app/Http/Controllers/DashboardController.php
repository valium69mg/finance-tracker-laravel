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
function getGraphData() {
    // PIE CHART
    $rent = DB::table('expenses')->whereRaw('category = ?',['Rent'])->get();
    $groceries = DB::table('expenses')->whereRaw('category = ?',['Groceries'])->get();
    $food = DB::table('expenses')->whereRaw('category = ?',['Food'])->get();
    $transport = DB::table('expenses')->whereRaw('category = ?',['Transport'])->get();
    $investment = DB::table('expenses')->whereRaw('category = ?',['Investment'])->get();
    $entertainment = DB::table('expenses')->whereRaw('category = ?',['Entertainment'])->get();
    $other = DB::table('expenses')->whereRaw('category = ?',['Other'])->get();

    // SUM ALL TOTAL EXPENSES FROM QUERIES
    $rentSum = 0;
    for($i = 0; $i < count($rent); $i++) {
        $rentSum = $rentSum + $rent[$i]->amount;
    }
    $groceriesSum = 0;
    for($i = 0; $i < count($groceries); $i++) {
        $groceriesSum = $groceriesSum + $groceries[$i]->amount;
    }
    $foodSum = 0;
    for($i = 0; $i < count($food); $i++) {
        $foodSum = $foodSum + $food[$i]->amount;
    }
    $transportSum = 0;
    for($i = 0; $i < count($transport); $i++) {
        $transportSum = $transportSum + $transport[$i]->amount;
    }
    $investmentSum = 0;
    for($i = 0; $i < count($investment); $i++) {
        $investmentSum = $investmentSum + $investment[$i]->amount;
    }
    $otherSum = 0;
    for($i = 0; $i < count($other); $i++) {
        $otherSum = $otherSum + $other[$i]->amount;
    }
    $entertainmentSum = 0;
    for($i = 0; $i < count($entertainment); $i++) {
        $entertainmentSum = $entertainmentSum + $entertainment[$i]->amount;
    }

    $pieData = [
        'rent' => $rentSum,
        'groceries' => $groceriesSum,
        'food' => $foodSum,
        'transport' => $transportSum,
        'investment' => $investmentSum,
        "entertainment"=> $entertainmentSum,
        'other' => $otherSum,
    ];

    // INCOME VS EXPENSES CHART
    $now = Carbon::now();
    $currentYear = $now->isoFormat('Y');
    //expenses
    $janExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-01-01 00:00:00',$currentYear.'-01-31 00:00:00'])->get();
    $febExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-02-01 00:00:00',$currentYear.'-02-28 00:00:00'])->get();
    $marchExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-03-01 00:00:00',$currentYear.'-03-31 00:00:00'])->get();
    $aprilExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-04-01 00:00:00',$currentYear.'-04-30 00:00:00'])->get();
    $mayExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-05-01 00:00:00',$currentYear.'-05-31 00:00:00'])->get();
    $junExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-06-01 00:00:00',$currentYear.'-06-30 00:00:00'])->get();
    $julyExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-07-01 00:00:00',$currentYear.'-07-31 00:00:00'])->get();
    $augExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-08-01 00:00:00',$currentYear.'-08-31 00:00:00'])->get();
    $sepExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-09-01 00:00:00',$currentYear.'-09-30 00:00:00'])->get();
    $octExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-10-01 00:00:00',$currentYear.'-10-31 00:00:00'])->get();
    $novExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-11-01 00:00:00',$currentYear.'-11-30 00:00:00'])->get();
    $dicExp = DB::table('expenses')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-12-01 00:00:00',$currentYear.'-12-31 00:00:00'])->get();
    //incomes
    $janInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-01-01 00:00:00',$currentYear.'-01-31 00:00:00'])->get();
    $febInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-02-01 00:00:00',$currentYear.'-02-28 00:00:00'])->get();
    $marchInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-03-01 00:00:00',$currentYear.'-03-31 00:00:00'])->get();
    $aprilInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-04-01 00:00:00',$currentYear.'-04-30 00:00:00'])->get();
    $mayInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-05-01 00:00:00',$currentYear.'-05-31 00:00:00'])->get();
    $junInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-06-01 00:00:00',$currentYear.'-06-30 00:00:00'])->get();
    $julyInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-07-01 00:00:00',$currentYear.'-07-31 00:00:00'])->get();
    $augInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-08-01 00:00:00',$currentYear.'-08-31 00:00:00'])->get();
    $sepInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-09-01 00:00:00',$currentYear.'-09-30 00:00:00'])->get();
    $octInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-10-01 00:00:00',$currentYear.'-10-31 00:00:00'])->get();
    $novInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-11-01 00:00:00',$currentYear.'-11-30 00:00:00'])->get();
    $dicInc = DB::table('incomes')->whereRaw('created_at > ? AND created_at < ?',[$currentYear.'-12-01 00:00:00',$currentYear.'-12-31 00:00:00'])->get();
    
    // FOR LOOPS TO GATHER ALL SUMS OF EXPENSES AND INCOME PER MONTH
    // JAN
    $janExpSum = 0;
    for ($i = 0; $i < count($janExp); $i++) {
        $janExpSum = $janExpSum + $janExp[$i]->amount;
    }
    $janIncSum = 0;
    for ($i = 0; $i < count($janInc); $i++) {
        $janIncSum = $janIncSum + $janInc[$i]->amount;
    }
    // FEB
    $febExpSum = 0;
    for ($i = 0; $i < count($febExp); $i++) {
        $febExpSum = $febExpSum + $febExp[$i]->amount;
    }
    $febIncSum = 0;
    for ($i = 0; $i < count($febInc); $i++) {
        $febIncSum = $febIncSum + $febInc[$i]->amount;
    }
    // MARCH 
    $marchExpSum = 0;
    for ($i = 0; $i < count($marchExp); $i++) {
        $marchExpSum = $marchExpSum + $marchExp[$i]->amount;
    }
    $marchIncSum = 0;
    for ($i = 0; $i < count($marchInc); $i++) {
        $marchIncSum = $marchIncSum + $marchInc[$i]->amount;
    }
    // APRIL
    $aprilExpSum = 0;
    for ($i = 0; $i < count($aprilExp); $i++) {
        $aprilExpSum = $aprilExpSum + $aprilExp[$i]->amount;
    }
    $aprilIncSum = 0;
    for ($i = 0; $i < count($aprilInc); $i++) {
        $aprilIncSum = $aprilIncSum + $aprilInc[$i]->amount;
    }
    // MAY
    $mayExpSum = 0;
    for ($i = 0; $i < count($mayExp); $i++) {
        $mayExpSum = $mayExpSum + $mayExp[$i]->amount;
    }
    $mayIncSum = 0;
    for ($i = 0; $i < count($mayInc); $i++) {
        $mayIncSum = $mayIncSum + $mayInc[$i]->amount;
    }
    // JUNE 
    $junExpSum = 0;
    for ($i = 0; $i < count($junExp); $i++) {
        $junExpSum = $junExpSum + $junExp[$i]->amount;
    }
    $junIncSum = 0;
    for ($i = 0; $i < count($junInc); $i++) {
        $junIncSum = $junIncSum + $junInc[$i]->amount;
    }

    // JULY
    $julyExpSum = 0;
    for ($i = 0; $i < count($julyExp); $i++) {
        $julyExpSum = $julyExpSum + $julyExp[$i]->amount;
    }
    $julyIncSum = 0;
    for ($i = 0; $i < count($julyInc); $i++) {
        $julyIncSum = $julyIncSum + $julyInc[$i]->amount;
    }
    // AUG
    $augExpSum = 0;
    for ($i = 0; $i < count($augExp); $i++) {
        $augExpSum = $augExpSum + $augExp[$i]->amount;
    }
    $augIncSum = 0;
    for ($i = 0; $i < count($augInc); $i++) {
        $augIncSum = $augIncSum + $augInc[$i]->amount;
    }

    // SEPT
    $sepExpSum = 0;
    for ($i = 0; $i < count($sepExp); $i++) {
        $sepExpSum = $sepExpSum + $sepExp[$i]->amount;
    }
    $sepIncSum = 0;
    for ($i = 0; $i < count($sepInc); $i++) {
        $sepIncSum = $sepIncSum + $sepInc[$i]->amount;
    }

    // OCT 
    $octExpSum = 0;
    for ($i = 0; $i < count($octExp); $i++) {
        $octExpSum = $octExpSum + $octExp[$i]->amount;
    }
    $octIncSum = 0;
    for ($i = 0; $i < count($octInc); $i++) {
        $octIncSum = $octIncSum + $octInc[$i]->amount;
    }

    // NOV 
    $novExpSum = 0;
    for ($i = 0; $i < count($novExp); $i++) {
        $novExpSum = $novExpSum + $novExp[$i]->amount;
    }
    $novIncSum = 0;
    for ($i = 0; $i < count($novInc); $i++) {
        $novIncSum = $novIncSum + $novInc[$i]->amount;
    }

    // DEC 
    $dicExpSum = 0;
    for ($i = 0; $i < count($dicExp); $i++) {
        $dicExpSum = $dicExpSum + $dicExp[$i]->amount;
    }
    $dicIncSum = 0;
    for ($i = 0; $i < count($dicInc); $i++) {
        $dicIncSum = $dicIncSum + $dicInc[$i]->amount;
    }


    $vsData = [
        "janExp" => $janExpSum,
        "janInc" => $janIncSum,
        "febExp" => $febExpSum,
        "febInc" => $febIncSum,
        "marchExp" => $marchExpSum,
        "marchInc" => $marchIncSum,
        "aprilExp" => $aprilExpSum,
        "aprilInc" => $aprilIncSum,
        "mayExp" => $mayExpSum,
        "mayInc" => $mayIncSum,
        "junExp" => $junExpSum,
        "junInc" => $junIncSum,
        "julyExp" => $julyExpSum,
        "julyInc" => $julyIncSum,
        "augExp" => $augExpSum,
        "augInc" => $augIncSum,
        "sepExp" => $sepExpSum,
        "sepInc" => $sepIncSum,
        "octExp" => $octExpSum,
        "octInc" => $octIncSum,
        "novExp" => $novExpSum,
        "novInc" => $novIncSum,
        "dicExp" => $dicExpSum,
        "dicInc" => $dicIncSum,
    ];

    return [$pieData,$vsData];
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
            
            // GRAPH DATA
            $graphData = getGraphData(); 
            $pieData = $graphData[0];
            $vsData = $graphData[1];
            
            return view("dashboard",compact("totalIncome","totalExpenses","totalBills","dates","loggedBills","pieData","vsData"));
            
        } else {
            return view("login");
        }
    }

    

    

}
