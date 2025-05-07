<?php

namespace App\Http\Controllers;

use App\Exports\AllTablesExport;
use App\Imports\AllTablesImport;
use App\Models\ContactUS;
use App\Models\SetValue;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use App\Models\Transaction;
use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Audit;
use Maatwebsite\Excel\Facades\Excel;


class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $date = Carbon::now();
        $salary = 0;
        $setvalue = SetValue::first();
        $fix_outcome = 0;
        if ($setvalue) {
            $salary = $setvalue->salary;
            $fix_outcome = $setvalue->fix_outcome;
        }
        $yearFilter = Carbon::now()->format('Y');

        if ($request->year) {
            $yearFilter = $request->year;
            $date = $date->year($yearFilter);
        }

        // Get the start and end dates for the current week
        // $start_date = Carbon::now()->startOfWeek()->subWeek()->format('Y-m-d H:i:s');
        $start_date = $date->copy()->startOfWeek()->format('Y-m-d H:i:s');
        $end_date = $date->copy()->endOfWeek()->format('Y-m-d H:i:s');
        $start_year = $date->copy()->startOfYear()->format('Y-m-d H:i:s');
        $end_year = $date->copy()->endOfYear()->format('Y-m-d H:i:s');
        $start_month = $date->copy()->startOfMonth()->format('Y-m-d H:i:s');
        $end_month = $date->copy()->endOfMonth()->format('Y-m-d H:i:s');

        // dd($start_month);
        $userId = Auth::id();
        $userRole = User::where('id', $userId)->first()->role;

        // Fetch transactions
        $transactions = Transaction::query()
            ->when($yearFilter, function ($query) use ($yearFilter) {
                return $query->whereYear('created_at', '=',  $yearFilter);
            })
            ->where('status', 'Active')->where('profile', $userRole)->get();

        $week_outcomes = $transactions->where('kategori', 'Pengeluaran')
            ->whereBetween('created_at', [$start_date, $end_date])
            ->pluck('nominal')->all();

        $week_incomes = $transactions->where('kategori', 'Pendapatan')
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

        $investments = Balance::where('tipe', 'Investment')
            ->whereYear('updated_at', $yearFilter)
            ->pluck('saldo')->all();
        // dd($yearFilter);
        // dd($investments);
        $pengeluaran = 0;
        $pengeluaran_tahunan = 0;
        $pendapatan_tahunan = 0;
        $investment_tahunan = 0;
        $pendapatan_bulanan = 0;
        $pengeluaran_bulanan = 0;
        $pengeluaran_mingguan = 0;
        $pendapatan_mingguan = 0;
        $year_now = Carbon::now()->format('Y');
        if ($request->year) {
            $year_now = $request->year;
        }

        foreach ($week_outcomes as $week_outcome) {
            $pengeluaran_mingguan = $pengeluaran_mingguan + $week_outcome;
        }

        foreach ($week_incomes as $week_income) {
            $pendapatan_mingguan = $pendapatan_mingguan + $week_income;
        }
        foreach ($month_outcomes as $month_outcome) {
            $pengeluaran_bulanan = $pengeluaran_bulanan + $month_outcome;
        }
        foreach ($month_incomes as $month_income) {
            $pendapatan_bulanan = $pendapatan_bulanan + $month_income;
        }

        foreach ($year_outcomes as $year_outcome) {
            $pengeluaran_tahunan = $pengeluaran_tahunan + $year_outcome;
        }
        foreach ($year_incomes as $year_income) {
            $pendapatan_tahunan = $pendapatan_tahunan + $year_income;
        }
        foreach ($investments as $investment) {
            $investment_tahunan = $investment_tahunan + $investment;
        }

        $area_chart = [];
        for ($i = 0; $i < 12; $i++) {
            $month = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
            $monthplus = $transactions->filter(function ($transaction) use ($year_now, $month) {
                $transaction_dt = new DateTime($transaction->created_at);
                return $transaction_dt->format('m') === $month
                    && $transaction_dt->format('Y') === $year_now
                    && $transaction->kategori === 'Pendapatan'
                    && $transaction->status === 'Active';
            })->pluck('nominal')->sum();

            $monthmin = $transactions->filter(function ($transaction) use ($year_now, $month) {
                $transaction_dt = new DateTime($transaction->created_at);
                return $transaction_dt->format('m') === $month
                    && $transaction_dt->format('Y') === $year_now
                    && $transaction->kategori === 'Pengeluaran'
                    && $transaction->status === 'Active';
            })->pluck('nominal')->sum();

            $area_chart[$i] = $monthplus - $monthmin;
            $totalmin[$i] = $monthmin;
        }
        // dd($totalmin);

        //menghitung pengeluaran yang berlebih pada bulan tertentu dan mendistribusikannya ke sisa bulan dalam setahun
        $key = 1;
        $overspent = 0;
        $thismonth = $date->format('m');
        while ($key < $thismonth - 1) {
            $get_overspent = $totalmin[$key] - $salary / 2;
            if ($get_overspent > 0) {
                $overspent = $overspent + $get_overspent;
            }
            $key+=1;
        }
// dd($overspent);

        $quota = $salary / 2 - $pengeluaran_bulanan - $overspent / (12 - $thismonth + 1); //jatah bulan ini

        $piedata = [
            'labels' => ['Earning', 'Spending', 'Investment'],
            'data' => [$pendapatan_tahunan, $pengeluaran_tahunan, $investment_tahunan],
            'backgroundColor' => ['#1cc88a', '#FF0000', '#36b9cc'],
            'hoverBackgroundColor' => ['#006400', '#8B0000', '#00008B'],
        ];

        //RYR
        $wallrope = $transactions->where('sub_kategori', 'Wallrope')->pluck('nominal')->sum();
        $hatha = $transactions->where('sub_kategori', 'Regular')->pluck('nominal')->sum();
        $special = $transactions->where('sub_kategori', 'Special')->pluck('nominal')->sum();

        $piedata2 = [
            'labels' => ['Wallrope', 'Hatha', 'Special'],
            'data' => [$wallrope, $hatha, $special],
            'backgroundColor' => ['#1cc88a', '#FF0000', '#36b9cc'],
            'hoverBackgroundColor' => ['#006400', '#8B0000', '#00008B'],
        ];

        $allgaji = Transaction::where('sub_kategori', 'Gaji')->whereNot('status', 'Deleted')->get();

        $spendable = (($salary * 12) / 2 - $pengeluaran_tahunan) + ($pendapatan_tahunan / 2); //jatah tahun ini

        foreach ($allgaji as $gaji) { //logic ini digunakan untuk mendapat nilai akurat gaji apabila ada pemotongan atau pembulatan lebih/kurang
            $spendable = ($spendable - $salary / 2) + ($gaji->nominal / 2);
        }



        $result = Transaction::select(Transaction::raw('YEAR(created_at) as year'))->where('status', 'Active')->where('profile', $userRole)->distinct()->get();
        $years = $result->pluck('year')->sort();

        $messages = ContactUS::where('status', 'Unread')->get()->sortByDesc('created_at');

        if ($messages->isEmpty()) {
            // Create a default Eloquent model with the same structure
            $messages = collect([new ContactUS([
                'name' => 'No messages',
                'email' => 'noemail@example.com',
                'status' => 'None',
                'message' => 'No unread messages available'
            ])]);
        }
        // dd($messages);
        $target = $fix_outcome;
        return view('/dashboard.index', [
            'spendable' => $spendable,
            'messages' => $messages,
            'fix_outcome' => $fix_outcome,
            'quota' => $quota,
            'pengeluaran_mingguan' => $pengeluaran_mingguan,
            'pendapatan_mingguan' => $pendapatan_mingguan,
            'pengeluaran_bulanan' => $pengeluaran_bulanan,
            'pendapatan_bulanan' => $pendapatan_bulanan,
            'pengeluaran_tahunan' => $pengeluaran_tahunan,
            'pendapatan_tahunan' => $pendapatan_tahunan,
            'investment_tahunan' => $investment_tahunan,
            'area_chart' => $area_chart,
            'piedata' => $piedata,
            'piedata_ryr' => $piedata2,
            'years' => $years,
            'transactions' => $transactions,
            'tahun' => $request->year,
            'target' => $target,
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

    public function audit(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if (!$start_date) {
            $start_date = Carbon::now()->firstOfMonth()->format('Y-m-d H:i:s');
        }
        if (!$end_date) {
            $end_date = Carbon::now()->lastOfMonth()->format('Y-m-d H:i:s');
        }

        $ips = Audit::all()->pluck('ip_address')->unique();

        $audits = Audit::query()
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                return $query->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            })
            ->get()->sortByDesc('created_at');

        return view('dashboard.audit.index', [
            'audits' => $audits,
            'ips' => $ips

        ]);
    }

    public function exportAll(Request $request)
    {
        return Excel::download(new AllTablesExport($request), 'all_data.xlsx');
    }

    public function importAll(Request $request)
    {
        Excel::import(new AllTablesImport($request), $request->file('excel_file'));

        return back()->with('success', 'All data imported successfully!');
    }
}
