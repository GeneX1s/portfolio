<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryrMembers;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryrClasses;
use App\Models\RYR\ryrParticipants;

class MemberController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama;
        $tipe = $request->tipe;


        // $member = ryrMembers::all();
        $member = ryrMembers::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_murid', 'like', '%' . $search . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->get();

        return view('dashboard.ryr.members.index', [
            'members' => $member,
        ]);
    }

    public function create()
    {
        return view('dashboard.ryr.members.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama_murid' => 'required',
            'tipe' => 'required',
            'join_date' => 'nullable',
            'total_attendance' => 'nullable',
            'dob' => 'nullable',
            'jenis_kelamin' => 'required',
            'deskripsi' => 'nullable',
        ]);
        // dd($input);
        if ($input['join_date'] == null) {
            $input['join_date'] = now();
        }
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryrMembers::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/members/index')->with('success', 'New member has been added');
    }

    public function show($id)
    {
        $member = ryrMembers::findOrFail($id);
        return view('dashboard.ryr.members.editGroup', [
            'member' => $member,
        ]);
    }

    public function edit($id)
    {
        $member = ryrMembers::findOrFail($id);
        return view('dashboard.ryr.members.edit', [
            'member' => $member,
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'nama_murid' => 'required',
            'tipe' => 'required',
            'join_date' => 'nullable',
            'total_attendance' => 'nullable',
            'dob' => 'nullable',
            'jenis_kelamin' => 'required',
            'deskripsi' => 'nullable',
        ]);

        if ($input['join_date'] == null) {
            $request['join_date'] = now();
        }
        $input['updated_at'] = now();
        $input = $request->all();

        $member = ryrMembers::findOrFail($id);
        $member->update($input);

        return redirect()->route('dashboard.members.index');
    }

    public function destroy($id)
    {
        $member = ryrMembers::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index');
    }

    public function getGroup($id)
    {
        $member = ryrMembers::findOrFail($id);
        $classes = ryrClasses::all();
        return view('dashboard.ryr.members.editGroup', [
            'member' => $member,
            'classes' => $classes,
        ]);
    }

    public function editGroup(Request $request, $id)
    {

        foreach ($request->classes as $class) {


            if (!ryrParticipants::where('id_kelas', $class)->exists()) {


            $member = ryrMembers::where('id', $id)->first();

            $get_class = ryrClasses::where('id', $class)->first();
            ryrParticipants::create([
                'id_member' => $member->id,
                'nama_member' => $member->nama_murid,
                'id_kelas' => $get_class->id,
                'nama_kelas' => $get_class->nama_kelas,
                'tipe' => $member->tipe,
                'deskripsi' => $member->nama_murid . 'Adalah peserta dari ' . $get_class->nama_kelas,
                'grup' => 'Template',
                'payment_status' => '-',
                'payment_type' => 'Cash',
            ]);
        }

    }
        return redirect()->route('dashboard.members.index');
    }
}
