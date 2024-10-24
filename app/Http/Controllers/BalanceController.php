<?php

namespace App\Http\Controllers;

use App\Models\SetValue;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\BalanceHis;
use App\Models\Transaction;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class BalanceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $balances = Balance::get();
    return view('dashboard.balances.index', [
      'balances' => $balances,
    ]);
  }

  public function create(Request $request)
  {
    return view('dashboard.balances.create', []);
  }

  public function edit(Balance $balance)
  {
    return view('dashboard.balances.edit', [
      'balance' => $balance
    ]);
  }

  public function store(Request $request)
  {
    $inputData = $request->validate([
      'nama' => 'required|min:1|max:90',
      'saldo' => 'required',
      'tipe' => 'required',
      'updated_at' => 'nullable',
    ]);
    $inputData['updated_at'] = Date::now();

    Balance::create($inputData);

    return redirect('/dashboard/balances/index')->with('success', 'New balance has been added');
  }

  public function update(Request $request, Balance $balance)
  {
    $inputData = $request->validate([
      'saldo' => 'required',
    ]);
    $inputData['updated_at'] = Date::now();

    $newBal = Balance::where('id', $balance->id)->first();

    $input = $request->all();

    $newBal->update([
      "saldo" => $input['saldo'],
    ]);

    return redirect('/dashboard/balances/index')->with('success', 'Balance has been updated');
  }

  public function destroy(Balance $balance)
  {

    Balance::destroy($balance->id);

    return redirect('/dashboard/balances/index')->with('success', 'Balance has been deleted');
  }

  public function move()
  {
    $balances = Balance::get();
    return view('dashboard.balances.move', [
      'balances' => $balances,
    ]);
  }

  public function transfer(Transaction $transaction, Request $request)
  {
    $date = Date::now();
    $code = md5(Str::random(10));

    $balance_from = $request["source"];
    $balance_to = $request["destination"];

    if ($balance_from == $balance_to) {
      return redirect('/dashboard/balances/index')->with('error', 'Cannot transfer to same balance');
    }
    $nominal = $request["nominal"];

    $getBalance = Balance::where('nama', $balance_from)->first();
    $toBalance =  Balance::where('nama', $balance_to)->first();

    $saldo_from = $getBalance->saldo;
    $saldo_to = $toBalance->saldo;

    $updateBal = $saldo_from - $nominal;
    $getBalance->update([
      'saldo' => $updateBal,
    ]);

    $updateBal = $saldo_to + $nominal;
    $toBalance->update([
      'saldo' => $updateBal,
    ]);

    $trxId = 'TRF|' . $code . $date;
    $input = [
      'nama' => $trxId,
      'nominal' => $request["nominal"],
      'kategori' => 'Transfer',
      'balance' => $balance_from,
      'balance_destination' => $balance_to,
      'deskripsi' => 'Perpindahan saldo',
      'created_at' => Carbon::now(),
      'status' => 'Done',
      'profile' => 'super-admin',
    ];

    $balancehisFrom = [
      'transaction_id' => $trxId,
    'balance_name'=>$balance_from,
    'saldo_before'=>$saldo_from,
    'saldo_after'=>$getBalance->saldo,
    'description'=>'transfer',
    'created_at'=>now(),
  ];
  
  $balancehisTo = [
    'transaction_id' => $trxId,
    'balance_name'=>$balance_to,
    'saldo_before'=>$saldo_to,
    'saldo_after'=>$toBalance->saldo,
    'description'=>'transfer',
    'created_at'=>now(),
    ];

    Transaction::create($input);

    BalanceHis::create($balancehisFrom);
    BalanceHis::create($balancehisTo);

    return redirect('/dashboard/balances/index')->with('success', 'Balance has been updated!');
  }

  public function history(Balance $balance, Request $request){
    $balancename = $balance->nama;
    // dd($balance->nama);
    $balance = Balance::where('nama',$balancename)->first()->saldo;
    $histories = BalanceHis::where('balance_name',$balancename)->get();

    return view('dashboard.balances.history', [

      'histories' => $histories,
      'balancename' => $balancename,
      'balance' => $balance
    ]);
  }

}
