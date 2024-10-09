<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\BalanceHis;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\SetValue;
use App\Models\Template;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index(Request $request)
  {
    $status_search = $request->status;
    $jenis_search = $request->jenis;
    $start_date = $request->start_date;
    $end_date = $request->end_date;


    $userId = Auth::id();
    $userRole = User::where('id', $userId)->first()->role;

    if (!$start_date) {
      $start_date = Carbon::now()->firstOfMonth()->format('Y-m-d H:i:s');
    }
    if (!$end_date) {
      $end_date = Carbon::now()->lastOfMonth()->format('Y-m-d H:i:s');
    }

    // if (!$request->status) {
    //   $status_search = "Active";
    // }
    if ($userRole == 'super-admin') {
      $profile_filter = 'super-admin';
    } else if ($userRole == 'admin') {

      $profile_filter = 'ryr';
    } else if ($userRole == 'finance') {
      $profile_filter = 'ryr';
    }
    // dd($profile_filter);

    $transactions = Transaction::query()
      ->when($status_search, function ($query) use ($status_search) {
        return $query->where('status', 'like', '%' . $status_search . '%');
      })
      ->when($jenis_search, function ($query) use ($jenis_search) {
        return $query->where('kategori', 'like', '%' . $jenis_search . '%');
      })
      ->when($profile_filter, function ($query) use ($profile_filter) {
        return $query->where('profile', $profile_filter);
      })
      ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
        return $query->whereDate('created_at', '>=', $start_date)
          ->whereDate('created_at', '<=', $end_date);
      })
      // ->where('status', 'Deleted')
      ->get();

    $total = 0;
    $pendapatan = 0;
    $pengeluaran = 0;
    $data = [];
    // foreach ($transactions as $transaction) {

    $plus = 0;
    $minus = 0;
    $pluses = $transactions->where('kategori', 'Pendapatan')->where('status', 'Active')->pluck('nominal')->all();
    $minuses = $transactions->where('kategori', 'Pengeluaran')->where('status', 'Active')->pluck('nominal')->all();
    foreach ($pluses as $plus) {
      $total = $total + $plus;
      $pendapatan = $pendapatan + $plus;
    }
    foreach ($minuses as $minus) {
      $total = $total - $minus;
      $pengeluaran = $pengeluaran + $minus;
    }
// dd($total);
    return view('dashboard.transactions.index', [
      // 'transactions' => $data,
      'transactions' => $transactions,
      'total' => $total,
      'pendapatan' => $pendapatan,
      'pengeluaran' => $pengeluaran,
    ]);
  }

  public function create() //redirect to page
  {
    $templates = Template::get();
    $balances = Balance::get();
    return view('/dashboard.transactions.create', [
      'templates' => $templates,
      'balances' => $balances,
    ]);
  }


  public function store(Request $request) //create data from input
  {
    // dd($request->all());
    // dd(Auth::id());
    $code = md5(Str::random(10));
    $date = Date::now();

    $request->validate([
      'nominal' => 'required',
      'kategori' => 'required',
      'sub_kategori' => 'required',
      'balance' => 'required',
      'deskripsi' => 'nullable',
      'created_at' => Carbon::now(),
      'status' => "Pending",
    ]);
    $input = $request->all();
    $userId = Auth::id();
    $userRole = User::where('id', $userId)->first()->role;


    if ($input['kategori'] == 'Pendapatan') {
      $input['nama'] = 'INC|' . $code . $date;
    } else if ($input['kategori'] == 'Pengeluaran') {
      $input['nama'] = 'OUT|' . $code . $date;
    } else {
      $input['nama'] = 'INV|' . $code . $date;
    }
    $input['created_at'] = Carbon::now()->format('Y-m-d');
    $input['updated_at'] = Carbon::now()->format('Y-m-d');
    $input['status'] = "Active";
    if ($userRole == 'super-admin') {
      $input['profile'] = $userRole;
    } else if ($userRole == 'admin') {
      $input['profile'] = 'ryr';
    } else if ($userRole == 'finance') {
      $input['profile'] = 'ryr';
    }


    // dd($input);
    Transaction::create($input);

    //////////////////balance//////////////////

    $thisBal = $input['balance'];
    $updateBal = Balance::where('nama', $thisBal)->first();
    $balHis = new BalanceHis();


    if ($input['kategori'] == 'Pengeluaran') {
      $newBal = $updateBal->saldo - $input['nominal'];
    } else {
      $newBal = $updateBal->saldo + $input['nominal'];
    }

    $balHis->create([
      'transaction_id' => $input['nama'],
      'balance_name' => $thisBal,
      'saldo_before' => $updateBal->saldo,
      'saldo_after' => $newBal,
    ]);

    $updateBal->update([
      'saldo' => $newBal,
    ]);

    ///////////////////////////////////////////

    return redirect('/dashboard/transactions/index')->with('success', 'New transaction has been added');
  }


  public function destroy(Transaction $transaction, Request $request)
  {
    $balanceHis = BalanceHis::where('transaction_id', $transaction->nama)->first();
    // dd($transaction);
    // dd($balanceHis);
    $balanceUpdate = Balance::where('nama', $balanceHis->balance_name)->first();

    $transaction = Transaction::where('id', $transaction->id)->first();


    $balanceUpdate->update([
      "saldo" => $balanceHis->saldo_before,
    ]);

    $transaction->update([
      "status" => "Deleted",
      "deleted_at" => Carbon::now(),
    ]);

    // Transaction::destroy($transaction->id);

    return redirect('/dashboard/transactions/index')->with('success', 'Transaction has been deleted');
  }


  public function template(Request $request)
  {

    $id_transact = Template::where('id', $request->input('template'))->first()->id_transact;
    $transaction = Transaction::where('id', $id_transact)->first();

    if (!$transaction) {
      return redirect()->back()->with('error', 'Transaction not found.');
    }

    if ($transaction->status == 'Deleted') {

      return redirect()->back()->with('error', 'Template has been deleted');
    }

    $userId = Auth::id();
    $userRole = User::where('id', $userId)->first()->role;
    if ($userRole == 'super-admin') {
      $transaction->profile = 'super-admin';
    } else if ($userRole == 'admin') {
      $transaction->profile = 'ryr';
    } else if ($userRole == 'finance') {
      $transaction->profile = 'ryr';
    }
    $input = [
      'nama' => $transaction->nama,
      'nominal' => $transaction->nominal,
      'kategori' => $transaction->kategori,
      'sub_kategori' => $transaction->sub_kategori,
      'balance' => $transaction->balance,
      'deskripsi' => $transaction->deskripsi,
      'created_at' => now(),
      'status' => $transaction->status,
      'profile' => $transaction->profile,
    ];


    // Create a new transaction template
    Transaction::create($input);

    // Redirect with success message
    return redirect('/dashboard/transactions/index')->with('success', 'New transaction has been added.');
  }


  public function template_add($transactionId)
  {
    // dd($request->all());


    // Retrieve the transaction
    $transaction = Transaction::findOrFail($transactionId);

    // Get the description
    $name = $transaction->deskripsi;

    // Prepare the input data
    $input['id_transact'] = $transactionId; // Exclude 'id' from the input if not needed
    $input['name'] = $name;

    // Create the template
    Template::create($input);

    // Redirect or respond as needed
    return redirect()->back()->with('success', 'Template created successfully.');
  }


  public function setvalue(Request $request)
  {

    $setvalue = Setvalue::where('id', 1)->first();

    $request->validate([
      'salary' => 'required',
      'outcome' => 'required',
    ]);

    $input = $request->all();


    $setvalue->update([
      "status" => "Deleted",
      'salary' => $input['salary'],
      'outcome' => $input['outcome'],
    ]);

    // Redirect or respond as needed
    return redirect()->back()->with('success', 'Value updated successfully.');
  }

  public function view_setvalue()
  {
    return view('dashboard.setvalue', []);
  }

  public function clear()
  {

    // Delete all transactions
    Transaction::query()->delete();

    return redirect('/dashboard/transactions/index')->with('success', 'Cleared all transaction log.');
    // return redirect()->back()->with('success', 'Value updated successfully.');
  }

  public function exportPDF()
  {
      $transactions = Transaction::all();
      $pdf = FacadePdf::loadView('dashboard.transactions.index', compact('transactions'));
// $total = 1;
      return $pdf->download('transactions.pdf');
  }
}
