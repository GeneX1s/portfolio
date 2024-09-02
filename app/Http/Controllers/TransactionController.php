<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Helpers\ApiResponse;
use App\Models\Ingredients;
use App\Models\SetValue;
use App\Models\Template;
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

    if (!$start_date) {
      $start_date = Carbon::now()->firstOfMonth()->format('Y-m-d H:i:s');
    }
    if (!$end_date) {
      $end_date = Carbon::now()->lastOfMonth()->format('Y-m-d H:i:s');
    }

    // if (!$request->status) {
    //   $status_search = "Active";
    // }
    // dd($status_search);

    $transactions = Transaction::query()
      ->when($status_search, function ($query) use ($status_search) {
        return $query->where('status', 'like', '%' . $status_search . '%');
      })
      ->when($jenis_search, function ($query) use ($jenis_search) {
        return $query->where('kategori', 'like', '%' . $jenis_search . '%');
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

    return view('/dashboard.transactions.index', [
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
    return view('/dashboard.transactions.create', [
      // 'transactions' => $data,
      'templates' => $templates,
    ]);
  }


  public function store(Request $request) //create data from input
  {
    // dd($request->all());
    // dd(Auth::id());
    // $code = md5(Str::random(10));
    $date = Date::now();

    $request->validate([
      'nominal' => 'required',
      'kategori' => 'required',
      'deskripsi' => 'nullable',
      'created_at' => Carbon::now(),
      'status' => "Pending",
    ]);
    $input = $request->all();

    // $input['created_at'] = Carbon::parse($today)->toString();

    $input['nama'] = 'TR|' . $date;
    $input['created_at'] = Carbon::now()->format('Y-m-d');
    $input['updated_at'] = Carbon::now()->format('Y-m-d');
    $input['status'] = "Active";

    // dd($input);
    Transaction::create($input);

    return redirect('/dashboard/transactions/index')->with('success', 'New transaction has been added');
  }


  public function destroy(Transaction $transaction, Request $request)
  {

    $transaction = Transaction::where('id', $transaction->id)->first();

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
    // Fetch the transaction details using the provided template ID
    $transaction = Transaction::where('id', $id_transact)->first();
    // dd($id_transact);
    // dd($transaction);
    if (!$transaction) {
      return redirect()->back()->with('error', 'Transaction not found.');
    }

    // Prepare data for the new template
    $input = [
      'nama' => $transaction->nama,
      'nominal' => $transaction->nominal,
      'kategori' => $transaction->kategori,
      'deskripsi' => $transaction->deskripsi,
      'created_at' => now(),
      'status' => $transaction->status,
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
    return view('dashboard.setvalue', [
    ]);
  }


}
