<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryrParticipants;
use App\Models\RYR\ryrClasses;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryrMembers;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    public function indexGroup(Request $request, $id)
    {
        $search = $request->nama_murid;
        $tipe = $request->tipe;

        $participants = ryrParticipants::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_murid', 'like', '%' . $search . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->where('id_kelas', $id)
            ->where('grup', 'Template')
            ->get();

        // dd($id);
        // $class = ryrClasses::get();
        // dd($class);
        $class = ryrClasses::where('id', $id)->first();

        // Return the view without dynamically injecting $id into the path
        return view('dashboard.ryr.participants.index', [
            'participants' => $participants,
            'id' => $id,
            'class' => $class,
        ]);
    }


    public function store(Request $request)
    {
        $input = $request->validate([
            'id_member' => 'required',
            'nama_member' => 'required',
            'id_kelas' => 'required',
            'nama_kelas' => 'required',
            'tipe' => 'required',
            'payment_type' => 'required',
            'payment_status' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($input);
        $input['id'] = $input['id_member'] .'-'.$input['id_kelas'].'-'.now()->format('Y-m-d');
        $input['grup'] = 'Template';
        $input['created_at'] = now();
        $input['updated_at'] = now();

        if ($input['tipe'] != 'Regular') {
            $input['payment_type'] = 'Bulanan';
        }

        ryrParticipants::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/participants/index')->with('success', 'New participant has been added');
    }

    public function edit($id)
    {
        $participant = ryrParticipants::where('id_kelas', $id)->get();

        $members = ryrMembers::get();
        // dd($members);
        $class = ryrClasses::where('id', $id)->first();
        $class_name = 0;

        // dd($participant);
        if (!$participant->isEmpty()) {
            $class = $participant[0]['id_kelas'];
            $class_name = $participant[0]['nama_kelas'];
        }
        // dd($id);
        return view('dashboard.ryr.participants.edit', [
            'participant' => $participant,
            'members' => $members,
            'id_kelas' => $id,
            'class_name' => $class_name,

        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'id_member' => 'required',
            'nama_member' => 'required',
            'id_kelas' => 'required',
            'nama_kelas' => 'required',
            'tipe' => 'required',
            'payment_type' => 'required',
            'payment_status' => 'required',
            'deskripsi' => 'required',
        ]);

        $input['grup'] = 'Template';
        $input['updated_at'] = now();
        $input = $request->all();

        $participant = ryrParticipants::findOrFail($id);
        $participant->update($input);

        return redirect()->route('dashboard.participants.index');
    }

    public function participantsGroup(Request $request, $id)
    {
        $request->validate([
            'participants' => 'required|array',
            'participants.*.id_member' => 'required|string|max:255',
            // 'participants.*.nama_member' => 'required|string|max:255',
        ]);

        // Loop through the participants array from the request
        foreach ($request->participants as $participant) {

            $member = ryrMembers::where('id', $participant['id_member'])->first();
            $class = ryrClasses::where('id', $id)->first();

            $participant['nama_member'] = $member->nama_member;
            $participant['id_kelas'] = $member->id_kelas;
            $participant['nama_kelas'] = $member->nama_kelas;
            $participant['tipe'] = $member->tipe;
            $participant['deskripsi'] = $member->deskripsi;

            // dd($class);

            $input = [
                'id_kelas' => $id,
                'id_member' => $participant['id_member'],
                'nama_member' => $member->nama_murid,
                'nama_kelas' => $class->nama_kelas,
                'tipe' => $member->tipe,
                'grup' => 'Template',
                'payment_type' => 'Transfer',
                'deskripsi' => $member->deskripsi,
            ];
            $input['deskripsi'] = 'p';

            ryrParticipants::create($input);
        }


        return redirect('/dashboard/ryr/participants/' . $id . '/index')->with('success', 'Participants have been updated');
    }

    public function deleteGroup(Request $request)
    {

        // dd($request->id);
        $id = ryrParticipants::where('id', $request->id)->first()->id;
        $class = ryrParticipants::where('id', $id)->first()->id_kelas;
        ryrParticipants::where('id', $id)->delete();

        // return redirect()->route('participants.index', ['id' => $id])->with('success', 'Participant has been deleted');
        return redirect('/dashboard/ryr/participants/' . $class . '/index')->with('success', 'Participant has been deleted');
    }
}
