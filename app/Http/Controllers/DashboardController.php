<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
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
    $transactions = Transaction::where('status','Active')->get();
    $week_outcomes = $transactions->where('kategori', 'Pengeluaran')
      ->whereBetween('created_at', [$start_date, $end_date])
      ->pluck('nominal')->all();
      
      $month_outcomes = $transactions->where('kategori', 'Pengeluaran')
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
      $pengeluaran_bulanan = 0;
      $pengeluaran_mingguan = 0;

      foreach($week_outcomes as $week_outcome){
        $pengeluaran_mingguan = $pengeluaran_mingguan + $week_outcome;
      }
      foreach($month_outcomes as $month_outcome){
        $pengeluaran_bulanan = $pengeluaran_bulanan + $month_outcome;
      }
      $persen_bulan_ini = ($pengeluaran_bulanan / 45000000) * 100;
// dd($pengeluaran_bulanan);
// dd($persen_bulan_ini);
      
      foreach($year_outcomes as $year_outcome){
        $pengeluaran_tahunan = $pengeluaran_tahunan + $year_outcome;
      }
      foreach($year_incomes as $year_income){
        $pendapatan_tahunan = $pendapatan_tahunan + $year_income;
      }
      foreach($investments as $investment){
        $investment_tahunan = $investment_tahunan + $investment;
      }

      $chart_1 = [
        ['value' => $pendapatan_tahunan, 'name' => 'Earning'],
        ['value' => $pengeluaran_tahunan, 'name' => 'Spending'],
        ['value' => $investment_tahunan, 'name' => 'Investment'],
    ];

    return view('dashboard.index', [
      'chart_1' => $chart_1,
      'pengeluaran_mingguan' => $pengeluaran_mingguan,
      'pengeluaran_bulanan' => $pengeluaran_bulanan,
      'pengeluaran_tahunan' => $pengeluaran_tahunan,
      'pendapatan_tahunan' => $pendapatan_tahunan,
      'persen_bulan_ini' => $persen_bulan_ini,
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

    // User::create([
    //     'name' => $request->name,
    //     'username' => $request->username,
    //     'email' => $request->email,
    //     'nip' => $request->nip,
    //     'password' => bcrypt($request->password),
    //     'is_admin' => $request->is_admin,
    // ]);
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
   * Display the specified resource.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  // public function show(Rating $rating)
  // {
  //     $ratings = Rating::get();

  //     foreach ($ratings as $key => $rating) {
  //         $id = $rating->id;
  //         $nama = $rating->nama;
  //         $email = $rating->email;
  //         $komen = $rating->komen;
  //         $nip = $rating->nip;
  //         $pegawai = $rating->employee_name;
  //         $review = 0;
  //         $sangat_tidak_puas = Rating::where('id', $rating->id)->where('sangat_tidak_puas', 1)->first();
  //         $tidak_puas = Rating::where('id', $rating->id)->where('tidak_puas', 1)->first();
  //         $sedang = Rating::where('id', $rating->id)->where('sedang', 1)->first();
  //         $puas = Rating::where('id', $rating->id)->where('puas', 1)->first();
  //         $sangat_puas = Rating::where('id', $rating->id)->where('sangat_puas', 1)->first();

  //         if ($sangat_tidak_puas) {
  //             $review = "Sangat Tidak Puas";
  //         }
  //         if ($tidak_puas) {
  //             $review = "Tidak Puas";
  //         }
  //         if ($sedang) {
  //             $review = "Sedang";
  //         }
  //         if ($puas) {
  //             $review = "Puas";
  //         }
  //         if ($sangat_puas) {
  //             $review = "Sangat Puas";
  //         }


  //         $data[$key] = [
  //             'id' => $id,
  //             'employee_name' => $pegawai,
  //             'nama' => $nama,
  //             'nip' => $nip,
  //             'email' => $email,
  //             'review' => $review,
  //             'komen' => $komen,
  //             // 'sangat_tidak_puas' => $sangat_tidak_puas,
  //             // 'tidak_puas' => $tidak_puas,
  //             // 'sedang' => $sedang,
  //             // 'puas' => $puas,
  //             // 'sangat_puas' => $sangat_puas,
  //         ];
  //     }
  //     dd($data);
  //     return view('dashboard.posts.show', [
  //         'ratings' => $data
  //     ]);
  // }

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
    // if($rating->image){
    //     Storage::delete($rating->image);
    // }

    User::destroy($user->id);

    return redirect('/dashboard/posts/employees')->with('success', 'Employee has been deleted');
  }

  // public function checkSlug(Request $request){
  //     $slug = SlugService::createSlug(Rating::class,'slug',$request->title);
  //     return response()->json(['slug' => $slug]);
  // }
}
