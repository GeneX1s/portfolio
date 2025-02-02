<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryr_members;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama_murid;
        $tipe = $request->tipe;


        // $member = ryr_members::all();
        $member = ryr_members::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_murid', 'like', '%' . $search . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->get();

        return view('dashboard.members.index', compact('ryr_members'));
    }

    public function create()
    {
        return view('dashboard.members.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama_murid' => 'required',
            'tipe' => 'required',
            'join_date' => 'required',
            'total_attendance' => 'required',
            'dob' => 'required',
            'jenis_kelamin' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($input);
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryr_members::create($input);

        // dd('ok');

        return redirect('/dashboard/members/index')->with('success', 'New member has been added');
    }

    public function show($id)
    {
        $member = ryr_members::findOrFail($id);
        return view('dashboard.members.show', compact('ryr_members'));
    }

    public function edit($id)
    {
        $member = ryr_members::findOrFail($id);
        return view('dashboard.members.edit', compact('ryr_members'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'nama_murid' => 'required',
            'tipe' => 'required',
            'join_date' => 'required',
            'total_attendance' => 'required',
            'dob' => 'required',
            'jenis_kelamin' => 'required',
            'deskripsi' => 'required',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $member = ryr_members::findOrFail($id);
        $member->update($input);

        return redirect()->route('dashboard.members.index');
    }

    public function destroy($id)
    {
        $member = ryr_members::findOrFail($id);
        $member->delete();

        return redirect()->route('dashboard.members.index');
    }
}
