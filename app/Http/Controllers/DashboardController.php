<?php

namespace App\Http\Controllers;

use App\Models\SetValue;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use App\Models\Transaction;
use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Audit;

class DashboardController extends Controller
{
  public function index(Request $request)
  {
    
    $date = Carbon::now();
    $yearFilter = $request->year;

    if($request->year){
      $date = $date->year($yearFilter);
    }

    // Get the start and end dates for the current week
    // $start_date = Carbon::now()->startOfWeek()->subWeek()->format('Y-m-d H:i:s');
    $start_date = $date->startOfWeek()->format('Y-m-d H:i:s');
    $end_date = $date->endOfWeek()->format('Y-m-d H:i:s');
    $start_year = $date->startOfYear()->format('Y-m-d H:i:s');
    $end_year = $date->endOfYear()->format('Y-m-d H:i:s');
    $start_month = $date->startOfMonth()->format('Y-m-d H:i:s');
    $end_month = $date->endOfMonth()->format('Y-m-d H:i:s');


    $userId = Auth::id();
    $userRole = User::where('id', $userId)->first()->role;

    // Fetch transactions
    $transactions = Transaction::query()
    ->when($yearFilter, function ($query) use ($yearFilter) {
      return $query->whereYear('created_at', '=',  $yearFilter);
    })
    ->where('status', 'Active')->where('profile', $userRole)->get();

    $week_outcomes = $transactions->where('kategori', 'Pengeluaran')
      ->whereBetween('created_at', [$start_date, $end_date])
      ->pluck('nominal')->all();

    $month_outcomes = $transactions->where('kategori', 'Pengeluaran')
      ->whereBetween('created_at', [$start_month, $end_month])
      ->pluck('nominal')->all();

    $month_incomes = $transactions->where('kategori', 'Pendapatan')
      ->whereBetween('created_at', [$start_month, $end_month])
      ->pluck('nominal')->all();

    $year_outcomes = $transactions->where('kategori', 'Pengeluaran')
      ->whereBetween('created_at', [$start_year, $end_year])
      ->pluck('nominal')->all();


    $year_incomes = $transactions->where('kategori', 'Pendapatan')
      ->whereBetween('created_at', [$start_year, $end_year])
      ->pluck('nominal')->all();

    $investments = Balance::where('tipe', 'Investment')
    // ->whereYear('created_at',$yearFilter)
    ->pluck('saldo')->all();

    $pengeluaran = 0;
    $pengeluaran_tahunan = 0;
    $pendapatan_tahunan = 0;
    $investment_tahunan = 0;
    $pendapatan_bulanan = 0;
    $pengeluaran_bulanan = 0;
    $pengeluaran_mingguan = 0;
    $year_now = Carbon::now()->format('Y');
    if($request->year){
      $year_now = $request->year;
    }
    
    foreach ($week_outcomes as $week_outcome) {
      $pengeluaran_mingguan = $pengeluaran_mingguan + $week_outcome;
    }
    foreach ($month_outcomes as $month_outcome) {
      $pengeluaran_bulanan = $pengeluaran_bulanan + $month_outcome;
    }
    $persen_bulan_ini = ($pengeluaran_bulanan / 45000000) * 100;
    
    foreach ($month_incomes as $month_income) {
      $pendapatan_bulanan = $pendapatan_bulanan + $month_income;
    }

    foreach ($year_outcomes as $year_outcome) {
      $pengeluaran_tahunan = $pengeluaran_tahunan + $year_outcome;
    }
    foreach ($year_incomes as $year_income) {
      $pendapatan_tahunan = $pendapatan_tahunan + $year_income;
    }
    foreach ($investments as $investment) {
      $investment_tahunan = $investment_tahunan + $investment;
    }
    
    $area_chart = [];
    for($i = 0; $i < 12 ; $i++){
      $month = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
      $monthplus = $transactions->filter(function ($transaction) use ($year_now,$month) {
        $transaction_dt = new DateTime($transaction->created_at);
        return $transaction_dt->format('m') === $month
          && $transaction_dt->format('Y') === $year_now
          && $transaction->kategori === 'Pendapatan'
          && $transaction->status === 'Active';
      })->pluck('nominal')->sum();
  
      $monthmin = $transactions->filter(function ($transaction) use ($year_now,$month) {
        $transaction_dt = new DateTime($transaction->created_at);
        return $transaction_dt->format('m') === $month
          && $transaction_dt->format('Y') === $year_now
          && $transaction->kategori === 'Pengeluaran'
          && $transaction->status === 'Active';
      })->pluck('nominal')->sum();
  
      $area_chart[$i] = $monthplus - $monthmin;
    }

    $data = [
      'labels' => ['Earning', 'Spending', 'Investment'],
      'data' => [$pendapatan_tahunan, $pengeluaran_tahunan, $investment_tahunan],
      'backgroundColor' => ['#1cc88a', '#FF0000', '#36b9cc'],
      'hoverBackgroundColor' => ['#2e59d9', '#17a673', '#2c9faf'],
    ];

    $allgaji = Transaction::where('sub_kategori', 'Gaji')->whereNot('status', 'Deleted')->get();
    $salary = SetValue::first()->salary;
    $fix_outcome = SetValue::first()->fix_outcome;
    $spendable = (($salary * 12) / 2 - $pengeluaran_tahunan) + ($pendapatan_tahunan / 2);

    foreach ($allgaji as $gaji) { //logic ini digunakan untuk mendapat nilai akurat gaji apabila ada pemotongan atau pembulatan lebih/kurang
      $spendable = ($spendable - $salary / 2) + ($gaji->nominal / 2);
    }

    $quota = $salary / 2 - $pengeluaran_bulanan;


  $result = Transaction::select(Transaction::raw('YEAR(created_at) as year'))->where('status', 'Active')->where('profile', $userRole)->distinct()->get();
$years = $result->pluck('year')->sort();

    return view('/dashboard.index', [
      'spendable' => $spendable,
      'fix_outcome' => $fix_outcome,
      'quota' => $quota,
      'pengeluaran_mingguan' => $pengeluaran_mingguan,
      'pengeluaran_bulanan' => $pengeluaran_bulanan,
      'pendapatan_bulanan' => $pendapatan_bulanan,
      'pengeluaran_tahunan' => $pengeluaran_tahunan,
      'pendapatan_tahunan' => $pendapatan_tahunan,
      'investment_tahunan' => $investment_tahunan,
      'persen_bulan_ini' => $persen_bulan_ini,
      'area_chart' => $area_chart,
      'data' => $data,
      'years' => $years,
      'transactions' => $transactions,
      'tahun' => $request->year,
    ]);
  }

  public function create_user(Request $request)
  {


    return view('/dashboard.posts.create_user');
  }

  public function store(Request $request)
  {
    $userData = $request->validate([
      'name' => 'required|min:1|max:90',
      'username' => 'required|unique:users',
      'nip' => 'required|unique:users',
      'email' => 'required|unique:users',
      'password' => 'required',
      'is_admin' => 'nullable',
    ]);
    $userData['password'] = Hash::make($userData['password']);

    User::create($userData);

    return redirect('/dashboard/posts/employees')->with('success', 'New user has been added');
  }

  public function destroy(User $user)
  {

    User::destroy($user->id);

    return redirect('/dashboard/posts/employees')->with('success', 'Employee has been deleted');
  }


  public function setValue(Request $request)
  {

    $salary = $request->salary;
    $setvalue = Setvalue::where('id', 1)->get();

    $setvalue->update([
      "salary" => $salary,
    ]);
  }

  public function audit(Request $request)
  {

    $start_date = $request->start_date;
    $end_date = $request->end_date;

    if (!$start_date) {
      $start_date = Carbon::now()->firstOfMonth()->format('Y-m-d H:i:s');
    }
    if (!$end_date) {
      $end_date = Carbon::now()->lastOfMonth()->format('Y-m-d H:i:s');
    }

    $ips = Audit::all()->pluck('ip_address')->unique();

    $audits = Audit::query()
      ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
        return $query->whereDate('created_at', '>=', $start_date)
          ->whereDate('created_at', '<=', $end_date);
      })
      ->get()->sortByDesc('created_at');

    return view('dashboard.audit.index', [
      'audits' => $audits,
      'ips' => $ips
      
    ]);
  }
}
