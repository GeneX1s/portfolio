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

    $updateBal = $getBalance->saldo - $nominal;
    $getBalance->update([
      'saldo' => $updateBal,
    ]);

    $updateBal = $toBalance->saldo + $nominal;
    $toBalance->update([
      'saldo' => $updateBal,
    ]);

    $input = [
      'nama' => 'TRF|' . $code . $date,
      'nominal' => $request["nominal"],
      'kategori' => 'Transfer',
      'balance' => $balance_from,
      'balance_destination' => $balance_to,
      'deskripsi' => 'Perpindahan saldo',
      'created_at' => Carbon::now(),
      'status' => 'Done',
      'profile' => 'super-admin',
    ];

    Transaction::create($input);

    return redirect('/dashboard/balances/index')->with('success', 'Balance has been updated!');
  }
}
