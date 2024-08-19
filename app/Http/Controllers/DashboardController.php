<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use App\Models\SetValue;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use App\Models\Special;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {

    // Get the start and end dates for the current week
    $start_date = Carbon::now()->startOfWeek()->subWeek()->format('Y-m-d H:i:s');
    $end_date = Carbon::now()->endOfWeek()->subWeek()->format('Y-m-d H:i:s');
    $start_year = Carbon::now()->startOfYear()->format('Y-m-d H:i:s');
    $end_year = Carbon::now()->endOfYear()->format('Y-m-d H:i:s');
    $start_month = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
    $end_month = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

    // Fetch transactions
    $transactions = Transaction::where('status', 'Active')->get();
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

    $investments = $transactions->where('kategori', 'Investment')
      ->whereBetween('created_at', [$start_year, $end_year])
      ->pluck('nominal')->all();

    $pengeluaran = 0;
    $pengeluaran_tahunan = 0;
    $pendapatan_tahunan = 0;
    $investment_tahunan = 0;
    $pendapatan_bulanan = 0;
    $pengeluaran_bulanan = 0;
    $pengeluaran_mingguan = 0;

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

      // $chart_1 = [
      //     ['value' => $pendapatan_tahunan, 'name' => 'Earning'],
      //     ['value' => $pengeluaran_tahunan, 'name' => 'Spending'],
      //     ['value' => $investment_tahunan, 'name' => 'Investment'],
      // ];
  
  

    $salary = SetValue::first()->salary;
    $spendable = ($salary * 12)/2 - $pengeluaran_tahunan;
    $quota = $salary/2 - $pengeluaran_bulanan;

    return view('dashboard.index', [
      'spendable' => $spendable,
      'quota' => $quota,
      'pengeluaran_mingguan' => $pengeluaran_mingguan,
      'pengeluaran_bulanan' => $pengeluaran_bulanan,
      'pendapatan_bulanan' => $pendapatan_bulanan,
      'pengeluaran_tahunan' => $pengeluaran_tahunan,
      'pendapatan_tahunan' => $pendapatan_tahunan,
      'investment_tahunan' => $investment_tahunan,
      'persen_bulan_ini' => $persen_bulan_ini,
     'chartData' => [
        'Earning' => $pendapatan_tahunan,
        'Spending' => $pengeluaran_tahunan,
        'Investment' => $investment_tahunan
    ]
    ]);
  }



  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create_user(Request $request)
  {


    return view('dashboard.posts.create_user');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
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


  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
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
