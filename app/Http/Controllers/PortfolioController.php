<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Portfolio;

class PortfolioController extends Controller
{

    public function index()
    {
        $portfolios = Portfolio::all();
        return view('dashboard.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('dashboard.portfolios.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'category_1' => 'required',
            'category_2' => 'required',
            'content' => 'required',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
        ]);

        $input['created_at'] = now();
        $input['updated_at'] = now();

        Portfolio::create($input);


        return redirect()->route('dashboard.portfolios.index');
    }

    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('dashboard.portfolios.show', compact('portfolio'));
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('dashboard.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        if ($request->hasFile('image')) {
            $portfolio->image = $request->file('image')->store('images', 'public');
        }
        $portfolio->save();

        return redirect()->route('dashboard.portfolios.index');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('dashboard.portfolios.index');
    }
}
