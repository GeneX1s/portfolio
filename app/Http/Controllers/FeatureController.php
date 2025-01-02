<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Features;

class FeatureController extends Controller
{

    public function index()
    {
        $features = Features::all();
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        $feature = Features::findOrFail($id);
        $feature->title = $request->title;
        $feature->description = $request->description;
        if ($request->hasFile('image')) {
            $feature->image = $request->file('image')->store('images', 'public');
        }
        $feature->save();

        return redirect()->route('dashboard.features.index');
    }

    public function destroy($id)
    {
        $feature = Features::findOrFail($id);
        $feature->delete();

        return redirect()->route('dashboard.features.index');
    }
}
