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

class DashboardController extends Controller
{
  public function index(Request $request)
  {

    // Get the start and end dates for the current week
    // $start_date = Carbon::now()->startOfWeek()->subWeek()->format('Y-m-d H:i:s');
    $start_date = Carbon::now()->startOfWeek()->format('Y-m-d H:i:s');
    $end_date = Carbon::now()->endOfWeek()->format('Y-m-d H:i:s');
    $start_year = Carbon::now()->startOfYear()->format('Y-m-d H:i:s');
    $end_year = Carbon::now()->endOfYear()->format('Y-m-d H:i:s');
    $start_month = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
    $end_month = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');


    $userId = Auth::id();
    $userRole = User::where('id', $userId)->first()->role;

    // Fetch transactions
    $transactions = Transaction::where('status', 'Active')->where('profile', $userRole)->get();
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

    $investments = Balance::where('tipe','Investment')->pluck('saldo')->all();

    $pengeluaran = 0;
    $pengeluaran_tahunan = 0;
    $pendapatan_tahunan = 0;
    $investment_tahunan = 0;
    $pendapatan_bulanan = 0;
    $pengeluaran_bulanan = 0;
    $pengeluaran_mingguan = 0;
    $year_now = Carbon::now()->format('Y');

    foreach ($week_outcomes as $week_outcome) {
      $pengeluaran_mingguan = $pengeluaran_mingguan + $week_outcome;
    }
    foreach ($month_outcomes as $month_outcome) {
      $pengeluaran_bulanan = $pengeluaran_bulanan + $month_outcome;
    }

    foreach ($month_incomes as $month_income) {
      $pendapatan_bulanan = $pendapatan_bulanan + $month_income;
    }
    $persen_bulan_ini = ($pengeluaran_bulanan / 45000000) * 100;
    // dd($pengeluaran_bulanan);
    // dd($persen_bulan_ini);

    foreach ($year_outcomes as $year_outcome) {
      $pengeluaran_tahunan = $pengeluaran_tahunan + $year_outcome;
    }
    foreach ($year_incomes as $year_income) {
      $pendapatan_tahunan = $pendapatan_tahunan + $year_income;
    }
    foreach ($investments as $investment) {
      $investment_tahunan = $investment_tahunan + $investment;
    }

    $january = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '01'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();


    $january_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '01'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $januari = $january - $january_b;

    $february = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '02'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $february_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '02'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $februari = $february - $february_b;

    $march = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '03'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $march_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '03'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $maret = $march - $march_b;

    $apriil = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '04'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $apriil_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '04'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $april = $apriil - $apriil_b;

    $may = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '05'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $may_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '05'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $mei = $may - $may_b;

    $june = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '06'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $june_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '06'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $juni = $june - $june_b;

    $july = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '07'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $july_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '07'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $juli = $july - $july_b;

    $august = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '08'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $august_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '08'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $agustus = $august - $august_b;

    $septemberr = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '09'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $septemberr_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '09'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $september = $septemberr - $septemberr_b;

    $october = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '10'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $october_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '10'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $oktober = $october - $october_b;

    $novemberr = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '11'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $novemberr_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '11'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $november = $novemberr - $novemberr_b;

    $december = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '12'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pendapatan'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $december_b = $transactions->filter(function ($transaction) use ($year_now) {
      $transaction_dt = new DateTime($transaction->created_at);
      return $transaction_dt->format('m') === '12'
        && $transaction_dt->format('Y') === $year_now
        && $transaction->kategori === 'Pengeluaran'
        && $transaction->status === 'Active';
    })->pluck('nominal')->sum();

    $desember = $december - $december_b;

    $area_chart = [$januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember];

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
      'transactions' => $transactions,
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
}
