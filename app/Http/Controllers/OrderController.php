<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Helpers\ApiResponse;
use App\Models\Ingredients;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function show(Order $order, Request $request)
  {
    $orders = Order::where('id', $order->id)->get();
    return view('dashboard.orders.detail', [
      'orders' => $orders,
    ]);
  }

  public function index(Request $request)
  {
    $transaksi_search = $request->id_transaksi;
    $menu_search = $request->id_menu;
    $start_date = $request->start_date;
    $end_date = $request->end_date;

    $orders = Order::query()
      ->when($transaksi_search, function ($query) use ($transaksi_search) {
        return $query->where('id_transaksi', 'like', '%' . $transaksi_search . '%');
      })
      ->when($menu_search, function ($query) use ($menu_search) {
        return $query->where('jenis', 'like', '%' . $menu_search . '%');
      })
      ->when($start_date, function ($query) use ($start_date, $end_date) {
        return $query->whereDate('created_at', '>=', $start_date)
          ->whereDate('created_at', '<=', $end_date);
      })
      ->get();

    return view('dashboard.orders.index', [
      // 'orders' => $data,
      'orders' => $orders,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {

    $menus = Menu::get();

    return view('dashboard.orders.create', [
      'menus' => $menus,
    ]);
    // return view('dashboard.orders.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'menus' => 'required|array',
      'menus.*.menu_id' => 'required',
      'menus.*.jumlah' => 'required',
      'deskripsi' => 'nullable',
    ]);

    try {
      DB::beginTransaction();

      foreach ($request->menus as $menu) {
        $thismenu = Menu::findOrFail($menu['menu_id']);
        $total = $thismenu->harga * $menu['jumlah'];

        $input = [
          'id_transaksi' => md5(Str::random(10)),
          'id_menu' => $menu['menu_id'],
          'jumlah' => $menu['jumlah'],
          'total' => $total,
          'deskripsi' => $request->deskripsi,
          'customer_name' => $request->customer_name,
          'customer_number' => $request->customer_number,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
          'status' => "Pending",
        ];

        Order::create($input);
      }

      DB::commit();

      return redirect('/dashboard/orders/index')->with('success', 'New order has been added');
    } catch (\Exception $e) {
      DB::rollback();
      return back()->withInput()->withErrors(['error' => 'Failed to create order. Please try again.']);
    }
  }



  public function destroy(Order $order, Request $request)
  {

    $order = Order::where('id', $order->id)->first();
    // $order->delete();
    // dd($order);
    $order->update([
      "status" => "Cancelled",
      "deleted_at" => Carbon::now(),
    ]);
    return redirect('/dashboard/orders/index')->with('success', 'Order has been deleted');
  }

  public function changeStatus(Order $order, Request $request)
  {


    // $order = Order::where('id', $order->id)->first();
    // $order->update([
    //   "status" => $request->status, //cancelled / done
    // ]);

    // dd("tes");
    $orders = Order::findOrFail($order->id);
    if ($order->status == "Pending") {

      $orders->update([
        "status" => $request->status, //cancelled / done
      ]);
      if ($request->status == "Done") {

        Transaction::create([
          'id' => $orders->id_transaksi,
          'nama' => 'Transaksi' . ' ' . $order->id_transaksi,
          'created_at' => Date::now(),
          'jenis' => 'Pesanan Menu',
          'tipe' => 'Pendapatan',
          'nominal' => $orders->total,
          'biaya_tambahan' => 0,
          'deskripsi' => 'Pesanan menu Done by system',
          'status' => 'Active',
          '_author' => 'System',
        ]);
      }
    } else {
      return response("Hanya bisa mengubah order dengan status Pending");
    }


    return redirect('/dashboard/orders/index')->with('success', 'Order status changed');
  }
}
