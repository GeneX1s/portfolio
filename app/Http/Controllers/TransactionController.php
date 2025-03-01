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
use App\Exports\TransactionsExport;
use App\Imports\TransactionImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

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

        if ($userRole == 'super-admin') {
            $profile_filter = 'super-admin';
        } else if ($userRole == 'admin') {

            $profile_filter = 'ryr';
        } else if ($userRole == 'finance') {
            $profile_filter = 'ryr';
        } else if ($userRole == 'ryr') {
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
            ->get()->sortByDesc('created_at');

        $total = 0;
        $pendapatan = 0;
        $pengeluaran = 0;
        $data = [];

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
        return view('dashboard.transactions.index', [
            'transactions' => $transactions,
            'total' => $total,
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
        ]);
    }

    public function pending()
    {

        $userId = Auth::id();
        $userRole = User::where('id', $userId)->first()->role;

        $transactions = Transaction::where('status', 'Pending')->where('profile', $userRole)
            ->get()->sortByDesc('created_at');

        $total = 0;
        $pendapatan = 0;
        $pengeluaran = 0;

        return view('dashboard.transactions.index', [
            'transactions' => $transactions,
            'total' => $total,
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
        ]);
    }

    public function create() //redirect to page
    {
        $templates = Template::get();
        $balances = Balance::whereNot('tipe', 'Investment')->get();
        return view('/dashboard.transactions.create', [
            'templates' => $templates,
            'balances' => $balances,
        ]);
    }


    public function store(Request $request) //create data from input
    {
        $code = md5(Str::random(10));
        $date = now();

        $request->validate([
            'nominal' => 'required',
            'kategori' => 'required',
            'sub_kategori' => 'required',
            'balance' => 'required',
            'deskripsi' => 'nullable',
            'created_at' => now(),
            'status' => "required",
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
        $input['created_at'] = now();
        $input['updated_at'] = now();
        $input['profile'] = Auth::user()->role;
        // if ($userRole == 'super-admin') {
        //   $input['profile'] = $userRole;
        // } else if ($userRole == 'admin') {
        //   $input['profile'] = 'ryr';
        // } else if ($userRole == 'finance') {
        //   $input['profile'] = 'ryr';
        // }


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
            'description' => $input['deskripsi'],
            'created_at' => $date,
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

        if ($balanceHis) {
            $balanceUpdate = Balance::where('nama', $balanceHis->balance_name)->first();
            if ($balanceUpdate) {

                $balanceUpdate->update([
                    "saldo" => $balanceHis->saldo_before,
                ]);
            }
        }


        $transaction = Transaction::where('id', $transaction->id)->first();


        $transaction->update([
            "status" => "Deleted",
            "deleted_at" => Carbon::now(),
        ]);

        // Transaction::destroy($transaction->id);

        return redirect('/dashboard/transactions/index')->with('success', 'Transaction has been deleted');
    }


    public function template($id = null, Request $request = null)
    {
        if ($id) {
            $id_transact = Template::where('id', $id)->first()->id_transact;
        } else {
            $id_transact = Template::where('id', $request->input('template'))->first()->id_transact;
        }

        $transaction = Transaction::where('id', $id_transact)->first();

        if (!$transaction) {
            abort(404, 'Transaction not found.');
        }

        if ($transaction->status == 'Deleted') {
            return redirect()->back()->with('error', 'Template has been deleted');
        }

        $userRole = Auth::user()->role;

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
            'description' => $input['deskripsi'],
            'created_at' => now(),
        ]);

        $updateBal->update([
            'saldo' => $newBal,
        ]);

        ///////////////////////////////////////////

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

    public function templates()
    { //index for templates


        $templates = Template::get();
        $transactions = [];

        foreach ($templates as $count => $template) {
            $transactions[$count] = Transaction::where('id', $template->id_transact)->get();
        }
        return view('dashboard.transactions.templates', [
            'templates' => $templates,
            'transactions' => $transactions,
        ]);
    }

    public function removeTemplate(Template $template)
    {

        $remove = Template::destroy('id', $template);

        return redirect('dashboard.transactions.templates')->with('success', 'Template removed.');
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
        $setvalue = SetValue::where('id', 1)->first();
        return view('dashboard.setvalue', [
            "setvalue" => $setvalue
        ]);
    }

    public function clear()
    {

        // Delete all transactions
        Transaction::query()->delete();
        Template::query()->delete();

        return redirect('/dashboard/transactions/index')->with('success', 'Cleared all transaction log.');
        // return redirect()->back()->with('success', 'Value updated successfully.');
    }

    public function exportTransactions(Request $request)
    {


        return Excel::download(new TransactionsExport($request), 'Transaction.xlsx');
    }

    public function reportIndex()
    {


        $userId = Auth::id();
        $userRole = User::where('id', $userId)->first()->role;
        // Get transactions with status 'Active', ordered by 'created_at'
        $transactions = Transaction::where('status', 'Active')
            ->orderBy('created_at')
            ->where('profile', $userRole)
            ->get();

        // Get the first transaction's year and the current year
        $firstTrx = $transactions->first();
        $firstYear = Carbon::parse($firstTrx?->created_at)->format('Y');
        $thisYear = Carbon::now()->format('Y');

        // Generate an array of years from the first year to the current year
        $years = range($firstYear, $thisYear);

        // Group transactions by year for faster lookup
        $groupedByYear = $transactions->groupBy(function ($transaction) {
            return Carbon::parse($transaction->created_at)->format('Y');
        });

        return view('dashboard.report.index', [
            'years' => $years,
            'groupedByYear' => $groupedByYear,  // Pass the grouped transactions
        ]);
    }

    public function reportDetail($year)
    {
        $transaction = Transaction::whereYear('created_at', $year)->get();

        //income,outcome,total,new investments,transaction statistics
        //pendapatan terbanyak dari...
        //pengeluaran terbanyak dari...
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048',
        ]);

        // Import the data from the Excel file
        Excel::import(new TransactionImport, $request->file('file'));

        return back()->with('success', 'Data Imported Successfully');
    }

    public function approve(Transaction $transaction)
    {

        // dd($transaction);
        $update = Transaction::where('id', $transaction->id)->first();

        $update->update([
            'status' => "Active",
        ]);

        return back()->with('success', 'Transaction done');
    }

    public function monthlyCron()
    {
        $monthlies = Template::where('flag', 'Monthly')->get();
        $investments = Balance::where('tipe', 'Investment')->get();

        foreach ($monthlies as $monthly) {
            $this->template($monthly->id);
            // dd('hi');
        }

        foreach($investments as $investment){
            if($investment->dividen > 0){
                $dividen = (($investment->dividen * $investment->saldo) / 100)/12;
                $id = 'DIV|' . md5(Str::random(10)) . now();
                Transaction::create([
                    'nama' => $id,
                    'nominal' => $dividen,
                    'kategori' => 'Pendapatan',
                    'sub_kategori' => 'Investment',
                    'balance' => $investment->penerima_dividen,
                    'deskripsi' => 'Dividen' . $investment->nama . now(),
                    'created_at' => now(),
                    'status' => 'Active',
                    'profile' => 'super-admin',
                ]);

                $balHis = new BalanceHis();
                $newBalance = $investment->saldo + $dividen;
                $balHis->create([
                    'transaction_id' => $id,
                    'balance_name' => $investment->penerima_dividen,
                    'saldo_before' => $investment->saldo,
                    'saldo_after' => $newBalance,
                    'description' => 'Dividen' . $investment->nama . now(),
                    'created_at' => now(),
                ]);

                $investment->update([
                    'saldo' => $newBalance,
                ]);
            }
        }
        return back()->with('success', 'Monthly transactions generated');
    }

    public function setMonthly($id)
    {

        $template = Template::where('id', $id)->first();
        // dd('hi');
        $input = [];
        if($template->flag == 'Monthly')
            $input['flag'] = '';
        else
            $input['flag'] = 'Monthly';
        // $input['flag'] = 'Monthly';

        $template->update($input);
        return back()->with('success', 'Flag updated!');
    }
}
