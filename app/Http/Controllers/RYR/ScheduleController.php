<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryr_schedules;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryr_class;
use App\Models\RYR\ryr_members;
use App\Models\RYR\ryr_participants;

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

    public function indexGroup(Request $request, $id)
    {
        $search = $request->nama_murid;
        $tipe = $request->tipe;

        $schedule = ryr_schedules::where('id', $id)->first();
        $participants = ryr_participants::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_member', 'like', '%' . $search . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->where('id_schedule', $id)
            ->where('grup', 'Schedule')
            ->get();

        $class = ryr_class::where('id', $schedule->class_id)->first();


        return view('dashboard.ryr.schedules.detail', [
            'participants' => $participants,
            'schedule' => $schedule,
            'id' => $id,
            'class' => $class,
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
        $class_name = ryr_class::where('id', $input['class_id'])->first()->nama_kelas;
        $input['class_name'] = $class_name;
        $input['status'] = 'Ongoing';
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryr_schedules::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/schedules/index')->with('success', 'New schedule has been added');
    }

    public function edit($id)
    {
        $schedule = ryr_schedules::findOrFail($id);
        $classes = ryr_class::all();
        return view('dashboard.ryr.schedules.edit', compact('schedule', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'class_id' => 'required',
            'tanggal' => 'required|date',
            'description' => 'nullable',
        ]);
        $input = $request->all();

        $class_name = ryr_class::where('id', $input['class_id'])->first()->nama_kelas;
        $input['class_name'] = $class_name;
        $input['status'] = 'Done';
        $input['updated_at'] = now();
        // dd($input);

        $schedule = ryr_schedules::findOrFail($id);
        $schedule->update($input);

        return redirect('/dashboard/ryr/schedules/index')->with('success', 'Schedule has been updated');
    }

    public function destroy($id)
    {
        $schedule = ryr_schedules::findOrFail($id);
        $schedule->delete();

        return redirect()->route('dashboard.schedules.index');
    }

    public function editGroup(Request $request, $id)
    {
        $request->validate([
            'participants' => 'required|array',
            'participants.*.id_member' => 'required|string|max:255',
            // 'participants.*.nama_member' => 'required|string|max:255',
        ]);

        $schedule = ryr_schedules::where('id', $id)->first();
        // Loop through the participants array from the request
        foreach ($request->participants as $participant) {

            $member = ryr_members::where('id', $participant['id_member'])->first();
            $class = ryr_class::where('id', $schedule->class_id)->first();

            $participant['nama_member'] = $member->nama_member;
            $participant['id_kelas'] = $member->id_kelas;
            $participant['nama_kelas'] = $member->nama_kelas;
            $participant['tipe'] = $member->tipe;
            $participant['deskripsi'] = $member->deskripsi;

            // dd($class);

            $input = [
                'id_kelas' => $class->id,
                'id_member' => $participant['id_member'],
                'nama_member' => $member->nama_murid,
                'nama_kelas' => $class->nama_kelas,
                'tipe' => $member->tipe,
                'grup' => 'Schedule',
                'payment_type' => 'Cash',
                'id_schedule' => $id,
                'deskripsi' => $member->deskripsi,
            ];
            $input['grup'] = 'Schedule';
            $input['deskripsi'] = 'p';
            // dd($input);
            ryr_participants::create($input);
        }


        return redirect('/dashboard/ryr/schedules/' . $id . '/detail')->with('success', 'Participants have been updated');
    }

    public function detailGroup($id)
    {
        $participant = ryr_participants::where('id_kelas', $id)->get();

        $schedule = ryr_schedules::where('id', $id)->first();
        $members = ryr_members::get();
        // dd($members);
        $class = ryr_class::where('id', $id)->first();
        $class_name = 0;

        // dd($participant);
        if (!$participant->isEmpty()) {
            $class = $participant[0]['id_kelas'];
            $class_name = $participant[0]['nama_kelas'];
        }
        // dd($id);
        return view('dashboard.ryr.schedules.editgroup', [
            'schedule' => $schedule,
            'members' => $members,
            'id_kelas' => $id,
            'class_name' => $class_name,

        ]);
    }
}
