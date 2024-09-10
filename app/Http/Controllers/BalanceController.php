<?php

namespace App\Http\Controllers;

use App\Models\SetValue;
use Illuminate\Http\Request;
use App\Models\Balance;
use DateTime;
use Carbon\Carbon;
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
    return view('dashboard.balances.create', [
    ]);
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


}
