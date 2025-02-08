<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryr_participants;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama_murid;
        $tipe = $request->tipe;


        // $participant = ryr_participants::all();
        $participant = ryr_participants::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_murid', 'like', '%' . $search . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->get();

        return view('dashboard.ryr.participants.index', compact('ryr_participants'));
    }

    public function create()
    {
        return view('dashboard.ryr.participants.create');
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
        return view('dashboard.ryr.participants.show', compact('ryr_participants'));
    }

    public function edit($id)
    {
        $participant = ryr_participants::findOrFail($id);
        return view('dashboard.ryr.participants.edit', compact('ryr_participants'));
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

        return redirect()->route('dashboard.ryr.participants.index');
    }

    public function destroy($id)
    {
        $participant = ryr_participants::findOrFail($id);
        $participant->delete();

        return redirect()->route('dashboard.ryr.participants.index');
    }

    public function participantsGroup(Request $request)
{
    // Validate the incoming request to ensure 'participants' is an array and each participant has a name and email
    $request->validate([
        'participants' => 'required|array',
        'participants.*.name' => 'required|string|max:255',  // Ensure participant name is required and a string
        'participants.*.email' => 'required|email|max:255', // Ensure valid email
    ]);

    // Loop through the participants array from the request
    foreach ($request->participants as $participant) {
        // Prepare the input data to insert into the database
        $input = [
            'class_id' => $request->class_id, // assuming you want to associate participants with a class
            'name' => $participant['name'],
            'email' => $participant['email'],
        ];

        // Insert the new participant into the 'participants' table (replace with your actual table name)
        DB::table('participants')->insert($input);
        // Alternatively, if you have a Participant model, you could use:
        // Participant::create($input);
    }

    // Redirect back to the menu index page with a success message
    return redirect('/dashboard/menus/index')->with('success', 'Participants have been updated');
}

}
