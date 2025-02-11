<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryr_schedule;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryr_class;

class ScheduleController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama_murid;
        $tipe = $request->tipe;


        // $schedule = ryr_schedule::all();
        $schedule = ryr_schedule::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_murid', 'like', '%' . $search . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->get();

        return view('dashboard.ryr.schedules.index', compact('ryr_schedule'));
    }

    public function create()
    {
        $classes = ryr_class::all();

        return view('dashboard.ryr.schedules.create',[
            'classes' => $classes,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'class_id' => 'required',
            'class_name' => 'required',
            'member_id' => 'required',
            'member_name' => 'required',
            'status' => 'required',
            'tanggal' => 'required|date',
            'payment_type' => 'required',
            'payment_status' => 'required',
            'description' => 'required',
        ]);
        // dd($input);
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryr_schedule::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/schedules/index')->with('success', 'New schedule has been added');
    }

    public function show($id)
    {
        $schedule = ryr_schedule::findOrFail($id);
        return view('dashboard.ryr.schedules.show', compact('ryr_schedule'));
    }

    public function edit($id)
    {
        $schedule = ryr_schedule::findOrFail($id);
        return view('dashboard.ryr.schedules.edit', compact('ryr_schedule'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'class_id' => 'required',
            'class_name' => 'required',
            'member_id' => 'required',
            'member_name' => 'required',
            'status' => 'required',
            'tanggal' => 'required|date',
            'payment_type' => 'required',
            'payment_status' => 'required',
            'description' => 'required',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $schedule = ryr_schedule::findOrFail($id);
        $schedule->update($input);

        return redirect()->route('dashboard.ryr.schedules.index');
    }

    public function destroy($id)
    {
        $schedule = ryr_schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('dashboard.ryr.schedules.index');
    }
}
