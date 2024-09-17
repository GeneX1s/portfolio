<?php

namespace App\Http\Controllers;

use App\Models\SetValue;
use Illuminate\Http\Request;
use App\Models\Asset;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class AssetController extends Controller
{

  public function index(Request $request)
  {
    $assets = Asset::get();
    return view('dashboard.assets.index', [
      'assets' => $assets,
    ]);

  }

  public function create(Request $request)
  {
    return view('dashboard.assets.create', [
    ]);
  }

  public function edit(Asset $asset)
  {
    return view('dashboard.assets.edit', [
      'asset' => $asset
    ]);
  }

  public function store(Request $request)
  {
    $inputData = $request->validate([
      'nama' => 'required|min:1|max:90',
      'harga_beli' => 'required',
      'jenis' => 'required',
      'status' => 'required',
      'tanggal_beli' => 'required',
      'updated_at' => 'nullable',
    ]);
    $inputData['updated_at'] = Date::now();

    Asset::create($inputData);

    return redirect('/dashboard/assets/index')->with('success', 'New asset has been added');
  }

  public function update(Request $request, Asset $asset)
  {
    $inputData = $request->validate([
      'nama' => 'required|min:1|max:90',
      'harga_beli' => 'required',
      'jenis' => 'required',
      'status' => 'required',
      'tanggal_beli' => 'required',
      'updated_at' => 'nullable',
    ]);
    $inputData['updated_at'] = Date::now();
// Retrieve a single asset instance by ID
$asset = Asset::find($asset->id);

// Check if the asset exists
if ($asset) {
    $asset->update($inputData);
} else {
  return redirect('/dashboard/assets/index')->with('failed', 'Not Found');

}

    return redirect('/dashboard/assets/index')->with('success', 'Asset has been updated');
  }

  public function destroy(Asset $asset)
  {

    Asset::destroy($asset->id);

    return redirect('/dashboard/assets/index')->with('success', 'Asset has been deleted');
  }


}
