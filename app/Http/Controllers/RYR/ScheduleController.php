<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryr_schedules;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryr_class;
use App\Models\RYR\ryr_members;
use App\Models\RYR\ryr_participants;

use function PHPUnit\Framework\isEmpty;

class ScheduleController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama_murid;
        $class_name = $request->class_name;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $status = $request->status;

        // dd($request->all());
        // $schedule = ryr_schedules::all();
        $schedule = ryr_schedules::query()
            ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
                return $query->whereDate('tanggal', '>=', $start_date)
                    ->whereDate('tanggal', '<=', $end_date);
            })
            ->when($class_name, function ($query) use ($class_name) {
                return $query->where('class_name', 'like', '%' . $class_name . '%');
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', 'like', '%' . $status . '%');
            })
            ->get();

        $classes = ryr_class::all();
        $participants = ryr_participants::all();

        return view('dashboard.ryr.schedules.index', [
            'participants' => $participants,
            'schedules' => $schedule,
            'search' => $search,
            'classes' => $classes,
        ]);
    }

    public function indexGroup(Request $request, $id)
    {
        $search = $request->nama_murid;
        $tipe = $request->tipe;
        $payment_status = $request->payment_status;
// dd($request->all());
        $schedule = ryr_schedules::where('id', $id)->first();
        $participants = ryr_participants::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_member', 'like', '%' . $search . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->when($payment_status, function ($query) use ($payment_status) {
                return $query->where('payment_status', 'like', '%' . $payment_status . '%');
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
            'tanggal' => 'required|date',
        ]);

        $input = $request->all();
        if (empty($input['class_id'])) {
            $input['class_id'] = 0;
        }

        $code = md5(Str::random(5));
        if ($input['class_id'] != 0) {

            $class = ryr_class::where('id', $input['class_id'])->first();
            $input['class_name'] = $class->nama_kelas;
            $input['teacher_name'] = $class->teacher;
            $input['tipe'] = 'Regular';
        } else {
            $input['class_id'] = substr($input['teacher_name'], 0, 5) . '_' . $code;
            $input['tipe'] = 'Special';
        }
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
                'id_kelas' => $schedule->class_id,
                'id_member' => $participant['id_member'],
                'nama_member' => $member->nama_murid,
                'nama_kelas' => $schedule->class_name,
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
    public function deleteGroup(Request $request)
    {

        // dd($request->id);
        $id = ryr_participants::where('id', $request->id)->first()->id;
        $class = ryr_participants::where('id', $id)->first()->id_kelas;
        ryr_participants::where('id', $id)->delete();

        // return redirect()->route('participants.index', ['id' => $id])->with('success', 'Participant has been deleted');
        return redirect('/dashboard/ryr/schedules/' . $id . '/detail')->with('success', 'Participants have been updated');
    }
}
