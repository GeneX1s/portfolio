<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryr_schedules;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryr_class;

class ScheduleController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama_murid;
        $class_name = $request->class_name;
        $start_date = $request->start_date;
        $end_date = $request->end_date;


        // $schedule = ryr_schedules::all();
        $schedule = ryr_schedules::query()
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                return $query->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            })
            ->when($class_name, function ($query) use ($class_name) {
                return $query->where('class_name', 'like', '%' . $class_name . '%');
            })
            ->get();

            $classes = ryr_class::all();

        return view('dashboard.ryr.schedules.index', [
            'schedules' => $schedule,
            'search' => $search,
            'classes' => $classes,
        ]);
    }

    public function create()
    {
        $classes = ryr_class::all();

        return view('dashboard.ryr.schedules.create', [
            'classes' => $classes,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'class_id' => 'required',
            'tanggal' => 'required|date',
            'description' => 'nullable',
        ]);
        // dd($input);
        $input['status'] = 'Ongoing';
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryr_schedules::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/schedules/index')->with('success', 'New schedule has been added');
    }

    public function show($id)
    {
        $schedule = ryr_schedules::findOrFail($id);
        return view('dashboard.ryr.schedules.show', compact('ryr_schedules'));
    }

    public function edit($id)
    {
        $schedule = ryr_schedules::findOrFail($id);
        return view('dashboard.ryr.schedules.edit', compact('ryr_schedules'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'class_id' => 'required',
            'tanggal' => 'required|date',
            'description' => 'nullable',
        ]);

        $input['status'] = 'Done';
        $input['updated_at'] = now();
        $input = $request->all();

        $schedule = ryr_schedules::findOrFail($id);
        $schedule->update($input);

        return redirect()->route('dashboard.ryr.schedules.index');
    }

    public function destroy($id)
    {
        $schedule = ryr_schedules::findOrFail($id);
        $schedule->delete();

        return redirect()->route('dashboard.ryr.schedules.index');
    }
}
