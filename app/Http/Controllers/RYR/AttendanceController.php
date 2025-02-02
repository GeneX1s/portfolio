<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Features;

class FeatureController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->name;
        $status = $request->status;


        // $features = Features::all();
        $features = Features::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', 'like', '%' . $status . '%');
            })
            ->get();

        return view('dashboard.features.index', compact('features'));
    }

    public function create()
    {
        return view('dashboard.features.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
        ]);
        // dd($input);
        $input['created_at'] = now();
        $input['updated_at'] = now();

        Features::create($input);

        // dd('ok');

        return redirect('/dashboard/features/index')->with('success', 'New feature has been added');
    }

    public function show($id)
    {
        $feature = Features::findOrFail($id);
        return view('dashboard.features.show', compact('feature'));
    }

    public function edit($id)
    {
        $feature = Features::findOrFail($id);
        return view('dashboard.features.edit', compact('feature'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'description' => 'required',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $feature = Features::findOrFail($id);
        $feature->update($input);

        return redirect()->route('dashboard.features.index');
    }

    public function destroy($id)
    {
        $feature = Features::findOrFail($id);
        $feature->delete();

        return redirect()->route('dashboard.features.index');
    }
}
