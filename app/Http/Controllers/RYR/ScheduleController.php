<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryrSchedules;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryrClasses;
use App\Models\RYR\ryrMembers;
use App\Models\RYR\ryrParticipants;
use App\Models\Transaction;
use Carbon\Carbon;

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

        if (!$start_date) {
            $start_date = Carbon::now()->firstOfMonth()->format('Y-m-d H:i:s');
        }
        if (!$end_date) {
            $end_date = Carbon::now()->lastOfMonth()->addDays(14)->format('Y-m-d H:i:s');
        }

        $schedule = ryrSchedules::query()
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
            ->get()->sortByDesc('created_at');;

        $classes = ryrClasses::all();
        $participants = ryrParticipants::all();

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
        $schedule = ryrSchedules::where('id', $id)->first();
        $participants = ryrParticipants::query()
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
        // dd($id);
        // dd($schedule);
        $class = ryrClasses::where('id', $schedule->class_id)->first();
        $total = 0;

        foreach ($participants as $participant) {
            if ($participant->tipe == 'Non-Member') {
                $total = $total + 1000000;
            } else if ($participant->tipe == 'Bulanan 1') {
                // $total = $total + 800000;
            } else {
                // $total = $total + 400000;
            }
        }

        return view('dashboard.ryr.schedules.detail', [
            'participants' => $participants,
            'schedule' => $schedule,
            'id' => $id,
            'total' => $total,
            'class' => $class,
        ]);
    }

    public function create()
    {
        $classes = ryrClasses::all();

        return view('dashboard.ryr.schedules.create', [
            'classes' => $classes,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        if ($request->wantsJson()) {
            $schedule = ryrSchedules::create([
                'class_id' => 1,
                'class_name' => $request->class_name,
                'teacher_name' => $request->teacher_name,
                'status' => 'Active',
                'tanggal' => date('Y-m-d', strtotime($request->start)),
                'start_time' => date('H:i:s', strtotime($request->start)),
                'end_time' => date('H:i:s', strtotime($request->end)),
                'tipe' => 'Event',
                'harga' => 0,
                'profit' => 0,
            ]);

            return response()->json($schedule);

            $schedule = ryrSchedules::create([
                'class_name' => $request->class_name,
                'teacher_name' => $request->teacher_name,
                'tanggal' => explode('T', $request->start)[0],
                'start_time' => explode('T', $request->start)[1],
                'end_time' => explode('T', $request->end)[1],
                // Add other fields as needed
            ]);
        }

        $input = $request->validate([
            'tanggal' => 'required|date',
        ]);

        $input = $request->all();
        if (empty($input['class_id'])) {
            $input['class_id'] = 0;
        }

        $code = md5(Str::random(5));
        if ($input['class_id'] != 0) {
            $class = ryrClasses::where('id', $input['class_id'])->first();
            $input['class_name'] = $class->nama_kelas;
            $input['teacher_name'] = $class->teacher;
            $input['harga'] = $class->biaya;
            $input['start_time'] = $class->start_time;
            $input['end_time'] = $class->end_time;
            // dd($class->nama_kelas);
            if (strpos($class->nama_kelas, 'Wallrope') !== false) {
                // dd('tes');
                $input['tipe'] = 'Wallrope';
            } else {
                $input['tipe'] = 'Regular';
            }
        } else {
            $input['class_id'] = substr($input['teacher_name'], 0, 5) . '_' . $code;
            $input['tipe'] = 'Special';
        }
        $input['status'] = 'Ongoing';
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryrSchedules::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/schedules/index')->with('success', 'New schedule has been added');
    }

    public function edit($id)
    {
        $schedule = ryrSchedules::findOrFail($id);
        $classes = ryrClasses::all();
        return view('dashboard.ryr.schedules.edit', compact('schedule', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            // 'class_id' => 'required',
            'tanggal' => 'required|date',
        ]);
        $input = $request->all();

        if (empty($input['class_id'])) {
            $input['class_id'] = 0;
        }
        // dd($input);
        $code = md5(Str::random(5));
        $input['class_id'] = substr($input['teacher_name'], 0, 5) . '_' . $code;
        $input['tipe'] = 'Special';
        // $input['class_name'] = $input['nama_kelas'];
        $input['status'] = 'Done';
        $input['updated_at'] = now();
        // dd($input);

        $schedule = ryrSchedules::findOrFail($id);
        $schedule->update($input);

        return redirect('/dashboard/ryr/schedules/index')->with('success', 'Schedule has been updated');
    }

    public function destroy($id)
    {
        $schedule = ryrSchedules::findOrFail($id);
        $schedule->delete();

        return redirect()->route('dashboard.schedules.index');
    }

    public function editGroup(Request $request, $id)
    {
        $request->validate([
            // 'participants' => 'required|array',
            // 'participants.*.id_member' => 'required|string|max:255',
            // 'participants.*.nama_member' => 'required|string|max:255',
        ]);

        $schedule = ryrSchedules::where('id', $id)->first();
        if (!$request->guests == null)
            foreach ($request->guests as $guest) {
                // dd($guest);
                $temp_id = md5(Str::random(10));
                $guest['id'] = $temp_id;

                $input = [
                    'id_kelas' => $schedule->class_id,
                    'id_member' => $temp_id,
                    'nama_member' => $guest['nama_member'],
                    'nama_kelas' => $schedule->class_name,
                    'tipe' => 'Guest',
                    'grup' => 'Schedule',
                    // 'harga' => $participant['harga'],
                    'payment_type' => 'Cash',
                    'id_schedule' => $id,
                ];

                $input['id'] = $input['id_member'] . '-' . $input['id_kelas'] . '-' . now()->format('Y-m-d');

                $input['grup'] = 'Schedule';
                $input['payment_status'] = 'Pending';
                $input['deskripsi'] = 'Peserta baru';
                // dd($input);
                ryrParticipants::create($input);
            }

        // Loop through the participants array from the request


        if (!$request->participants == null)
            foreach ($request->participants as $participant) {
                $member = ryrMembers::where('id', $participant['id_member'])->first();
                $checkexist = ryrParticipants::where('id_member', $participant['id_member'])->where('grup', 'Schedule')->where('id_kelas', $schedule->class_id)->first();

                if (!$checkexist) {
                    // return null;

                    $template = ryrParticipants::where('id', $participant['id_member'])->where('grup', 'Template')->first();

                    $participant['nama_member'] = $member->nama_member;
                    $participant['id_kelas'] = $member->id_kelas;
                    $participant['nama_kelas'] = $member->nama_kelas;
                    $participant['tipe'] = $member->tipe;
                    $participant['deskripsi'] = $member->deskripsi;

                    // if ($member['tipe'] != 'Regular') {

                    //     $payType = 'Bulanan';
                    // }
                    if ($template) {
                        $payType = $template->payment_type;
                    } else {
                        $payType = 'Cash';
                    }


                    $input = [
                        'id_kelas' => $schedule->class_id,
                        'id_member' => $participant['id_member'],
                        'nama_member' => $member->nama_murid,
                        'nama_kelas' => $schedule->class_name,
                        'tipe' => $member->tipe,
                        'grup' => 'Schedule',
                        // 'harga' => $participant['harga'],
                        'payment_type' => $payType,
                        'id_schedule' => $id,
                        'deskripsi' => $member->deskripsi,
                    ];
                    $input['id'] = $input['id_member'] . '-' . $input['id_kelas'] . '-' . now()->format('Y-m-d');
                    $input['grup'] = 'Schedule';
                    $input['payment_status'] = 'Pending';
                    $input['deskripsi'] = 'Peserta reguler';
                    // dd($input);
                    ryrParticipants::create($input);
                }
            }


        return redirect('/dashboard/ryr/schedules/' . $id . '/detail')->with('success', 'Participants have been updated');
    }

    public function detailGroup(Request $request, $id)
    {
        $schedule = ryrSchedules::where('id', $id)->first();
        $participant = ryrParticipants::where('id_kelas', $schedule->class_id)->get();

        $search = $request->nama;


        $members = ryrMembers::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_murid', 'like', '%' . $search . '%');
            })
            ->get();
        // dd($members);
        $class = ryrClasses::where('id', $schedule->class_id)->first();
        $class_name = 0;

        // dd($participant);
        if (!$participant->isEmpty()) {
            $class = $participant[0]['id_kelas'];
            $class_name = $participant[0]['nama_kelas'];
        }


        $preselectedParticipants = ryrParticipants::where('id_kelas', $schedule->class_id)->where('grup', 'Template')->get();
        // dd($id);

        // dd($preselectedParticipants);
        return view('dashboard.ryr.schedules.editgroup', [
            'participant' => $participant,
            'schedule' => $schedule,
            'members' => $members,
            'id_kelas' => $id,
            'class_name' => $class_name,
            'preselectedParticipants' => $preselectedParticipants,

        ]);
    }

    public function detailGroupWithTemplate($id)
    {
        $participant = ryrParticipants::where('id_kelas', $id)->get();

        $schedule = ryrSchedules::where('id', $id)->first();
        $members = ryrMembers::get();
        // dd($members);
        $class_name = 0;

        if (!$participant->isEmpty()) {
            $class = $participant[0]['id_kelas'];
            $class_name = $participant[0]['nama_kelas'];
        }

        $preselectedParticipants = ryrParticipants::where('id_kelas', $id)->where('grup', 'Template')->get();
        // dd($id);
        // dd('hi');
        return view('dashboard.ryr.schedules.editgroupwithtemplate', [
            'schedule' => $schedule,
            'members' => $members,
            'id_kelas' => $id,
            'class_name' => $class_name,
            'class' => $class,
            'preselectedParticipants' => $preselectedParticipants,
        ]);
    }


    public function deleteGroup(Request $request)
    {

        //id adalah milik participant
        // dd($request->id);
        $schedule = ryrParticipants::where('id', $request->id)->first()->id_schedule;
        ryrParticipants::where('id', $request->id)->delete();

        // return redirect()->route('participants.index', ['id' => $id])->with('success', 'Participant has been deleted');
        return redirect('/dashboard/ryr/schedules/' . $schedule . '/detail')->with('success', 'Participant has been deleted');
    }

    public function editParticipant($id)
    {
        $participant = ryrParticipants::findOrFail($id);
        // dd($participant);
        $schedule = ryrSchedules::where('id', $participant->id_schedule)->first();
        $members = ryrMembers::get();
        $class = ryrClasses::where('id', $participant->id_kelas)->first();
        // dd($class);
        return view('dashboard.ryr.schedules.editparticipant', [
            'participant' => $participant,
            'schedule' => $schedule,
            'members' => $members,
            'class' => $class,
        ]);
    }

    public function updateParticipant(Request $request, $id)
    {
        $participant = ryrParticipants::findOrFail($id);
        // dd($request);
        $input = $request->all();

        $participant->update($input);


        return redirect('/dashboard/ryr/schedules/' . $participant->id_schedule . '/detail')->with('success', 'Participant has been updated');
    }

    public function finalize($id, Request $request)
    {

        $code = md5(Str::random(10));
        $date = now();
        $schedules = ryrSchedules::where('id', $id)->first();

        $input = [];
        $input['status'] = 'Done';
        $input['profit'] = $request['nominal'];

        $schedules->update($input);

        $nama_trx = 'RYR|' . $code . $date;
        $desc = $schedules->class_name;
        Transaction::create([
            'nama' => $nama_trx,
            'nominal' => $request['nominal'],
            'kategori' => 'Pendapatan',
            'sub_kategori' => $schedules->tipe,
            'balance' => 'RYR',
            'deskripsi' => $desc,
            'created_at' => now(),
            'profile' => 'RYR',
            'status' => "Active",
        ]);

        return redirect('/dashboard/ryr/schedules/')->with('success', 'Class finalized');
    }

    public function clear()
    {

        // Delete all transactions
        ryrSchedules::query()->delete();

        return redirect('/dashboard/ryr/schedules')->with('success', 'Cleared all schedules.');
        // return redirect()->back()->with('success', 'Value updated successfully.');
    }

    public function pay($id)
    {

        // $schedules = ryrSchedules::where('id', $id)->first();
        $participant = ryrParticipants::where('id', $id)->first();
        $input = [];

        if ($participant->payment_status == 'Done') {
            $input['payment_status'] = 'Pending';
        } else {
            $input['payment_status'] = 'Done';
        }


        $participant->update($input);

        return redirect('/dashboard/ryr/schedules/' . $participant->id_schedule . '/detail')->with('success', 'Payment updated');
    }
}
