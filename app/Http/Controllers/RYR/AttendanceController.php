<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryrAttendances;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama;
        $status = $request->status;


        // $attendance = ryrAttendances::all();
        $attendances = ryrAttendances::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', 'like', '%' . $status . '%');
            })
            ->get();

        return view('dashboard.ryr.attendances.index', [
            'attendances' => $attendances,
        ]);
    }

    public function create()
    {
        return view('dashboard.ryr.attendances.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required',
            'salary' => 'required',
            'join_date' => 'nullable',
            'dob' => 'nullable',
            'jenis_kelamin' => 'required',
            'status' => 'nullable',
            'foto' => 'nullable',
            'deskripsi' => 'nullable',
        ]);
        $input['join_date'] = now();
        $input['created_at'] = now();
        $input['updated_at'] = now();

        // dd($input);
        ryrAttendances::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/attendances/index')->with('success', 'New attendance has been added');
    }

    public function show($id)
    {
        $attendance = ryrAttendances::findOrFail($id);
        return view('dashboard.ryr.attendances.show', compact('ryrAttendances'));
    }

    public function edit($id)
    {
        $attendance = ryrAttendances::findOrFail($id);
        return view('dashboard.ryr.attendances.edit', [
            'attendance' => $attendance,
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'nama' => 'required',
            'salary' => 'required',
            'join_date' => 'required',
            'dob' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'foto' => 'nullable',
            'deskripsi' => 'required',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $attendance = ryrAttendances::findOrFail($id);
        $attendance->update($input);

        return redirect()->route('dashboard.ryr.attendances.index');
    }

    public function destroy($id)
    {
        $attendance = ryrAttendances::findOrFail($id);
        $attendance->delete();

        return redirect()->route('dashboard.ryr.attendances.index');
    }
}
