<?php

namespace App\Http\Controllers;

use App\Exports\BalanceExport;
use App\Imports\BalanceImport;
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
use Maatwebsite\Excel\Facades\Excel;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->nama;
        $tipe = $request->tipe;

        if ($search || $tipe) {

            $balances = Balance::query()
                ->when($search, function ($query) use ($search) {
                    return $query->where('nama', 'like', '%' . $search . '%');
                })
                ->when($tipe, function ($query) use ($tipe) {
                    return $query->where('tipe', 'like', '%' . $tipe . '%');
                })
                ->get();
        } else {
            $balances = Balance::get();
        }

        $investments = $balances->where('tipe', 'Investment')->all();
        $profit = 0;
        foreach ($investments as $investment) {
            $profit = $profit + ($investment->saldo * $investment->dividen) / 100;
        }
        return view('dashboard.balances.index', [
            'balances' => $balances,
            'profit' => $profit,

        ]);
    }

    public function create(Request $request)
    {
        $balances = Balance::get();
        return view('dashboard.balances.create', [
            'balances' => $balances,
        ]);
    }

    public function edit(Balance $balance)
    {
        $balances = Balance::get();
        return view('dashboard.balances.edit', [
            'balances' => $balances,
            'balance' => $balance
        ]);
    }

    public function store(Request $request)
    {
        $inputData = $request->validate([
            'nama' => 'required|min:1|max:90',
            'saldo' => 'required',
            'tipe' => 'required',
            'dividen' => 'nullable',
            'penerima_dividen' => 'nullable',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
        ]);
        $inputData['created_at'] = Date::now();
        $inputData['updated_at'] = Date::now();
// 'penerima_dividen' => $input['penerima_dividen'],
        Balance::create($inputData);

        return redirect('/dashboard/balances/index')->with('success', 'New balance has been added');
    }

    public function update(Request $request, Balance $balance)
    {


        $inputData = $request->validate([
            'saldo' => 'required',
            'dividen' => 'nullable',
        ]);
        $inputData['updated_at'] = Date::now();

        $newBal = Balance::where('id', $balance->id)->first();

        $input = [];

        $input = $request->all();

        if (empty($input['dividen']))
            $input['dividen'] = 0;


        // dd($input);
        $date = Date::now();
        $code = md5(Str::random(10));
        $trxId = 'TRF|' . $code . $date;
        $balancehis = [
            'transaction_id' => $trxId,
            'balance_name' => $balance->nama,
            'saldo_before' => $balance->saldo,
            'saldo_after' => $input['saldo'],
            'description' => 'Update Balance',
            'created_at' => now(),
        ];

        $newBal->update([
            "saldo" => $input['saldo'],
            "dividen" => $input['dividen'],
            'penerima_dividen' => $input['penerima_dividen'],
        ]);
        BalanceHis::create($balancehis);


        return redirect('/dashboard/balances/index')->with('success', 'Balance has been updated');
    }

    public function destroy(Balance $balance)
    {

        Balance::destroy($balance->id);

        BalanceHis::where('balance_name', $balance->nama)->delete();
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
            'balance_name' => $balance_from,
            'saldo_before' => $saldo_from,
            'saldo_after' => $getBalance->saldo,
            'description' => 'Transfer Balance',
            'created_at' => now(),
        ];

        $balancehisTo = [
            'transaction_id' => $trxId,
            'balance_name' => $balance_to,
            'saldo_before' => $saldo_to,
            'saldo_after' => $toBalance->saldo,
            'description' => 'transfer',
            'created_at' => now(),
        ];

        Transaction::create($input);

        BalanceHis::create($balancehisFrom);
        BalanceHis::create($balancehisTo);

        return redirect('/dashboard/balances/index')->with('success', 'Balance has been updated!');
    }

    public function history(Balance $balance, Request $request)
    {
        $balancename = $balance->nama;
        // dd($balance->nama);
        $balance = Balance::where('nama', $balancename)->first()->saldo;
        $histories = BalanceHis::where('balance_name', $balancename)->get();

        return view('dashboard.balances.history', [

            'histories' => $histories,
            'balancename' => $balancename,
            'balance' => $balance
        ]);
    }


    public function exportBalances(Request $request)
    {


        return Excel::download(new BalanceExport(), 'Balance.xlsx');
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048',
        ]);

        // Import the data from the Excel file
        Excel::import(new BalanceImport, $request->file('file'));

        return back()->with('success', 'Data Imported Successfully');
    }
}
