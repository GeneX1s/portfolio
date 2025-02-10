<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryr_participants;
use App\Models\RYR\ryr_class;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryr_members;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    public function indexGroup(Request $request, $id)
    {
        $search = $request->nama_murid;
        $tipe = $request->tipe;

        $participants = ryr_participants::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_murid', 'like', '%' . $search . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->where('id_kelas', $id)
            ->get();
            // dd($id);
            $class = ryr_class::where('id', $id)->first();

        // Return the view without dynamically injecting $id into the path
        return view('dashboard.ryr.participants.index', [
            'participants' => $participants,
            'id' => $id,
            'class' => $class,
        ]);
    }


    public function create()
    {
        return view('dashboard.participants.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'id_member' => 'required',
            'nama_member' => 'required',
            'id_kelas' => 'required',
            'nama_kelas' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($input);
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryr_participants::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/participants/index')->with('success', 'New participant has been added');
    }

    public function show($id)
    {
        $participant = ryr_participants::findOrFail($id);
        return view('dashboard.participants.show', compact('ryr_participants'));
    }

    public function edit($id)
    {
        $participant = ryr_participants::where('id_kelas',$id)->get();

        $members = ryr_members::get();
        // dd($members);
        $class = ryr_class::where('id', $id)->first();
        $class_name = 0;


        if(!$participant->isEmpty()){
            $class = $participant->id_kelas;
            $class_name = $participant->nama_kelas;
        }
// dd($id);
        return view('dashboard.ryr.participants.edit', [
            'participant' => $participant,
            'members' => $members,
            'id_kelas' => $id,
            'class_name' => $class->nama_kelas,

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
            'deskripsi' => 'required',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $participant = ryr_participants::findOrFail($id);
        $participant->update($input);

        return redirect()->route('dashboard.participants.index');
    }

    public function destroy($id)
    {
        $participant = ryr_participants::findOrFail($id);
        $participant->delete();

        return redirect()->route('dashboard.participants.index');
    }

    public function participantsGroup(Request $request)
    {
        $request->validate([
            'participants' => 'required|array',
            'participants.*.id_member' => 'required|string|max:255',
            'participants.*.nama_member' => 'required|string|max:255',
        ]);


        // Loop through the participants array from the request
        foreach ($request->participants as $participant) {

            $member = ryr_members::where('id', $participant['id_member'])->first();
            $participant['nama_member'] = $member->nama_member;
            $participant['id_kelas'] = $member->id_kelas;
            $participant['nama_kelas'] = $member->nama_kelas;
            $participant['tipe'] = $member->tipe;
            $participant['deskripsi'] = $member->deskripsi;

            dd($request->id_kelas);
            $input = [
                'id_kelas' => $request->id_kelas,
                // 'id_kelas' => $participant['id_kelas'],
                'id_member' => $participant['id_member'],
                'nama_member' => $participant['nama_member'],
                'nama_kelas' => $participant['nama_kelas'],
                'tipe' => $participant['tipe'],
                'deskripsi' => $participant['deskripsi']
            ];

            // DB::table('participants')->insert($input);
            ryr_participants::create($input);
        }

        // Redirect back to the menu index page with a success message
        return redirect('/dashboard/ryr/participants/index')->with('success', 'Participants have been updated');
    }
}
