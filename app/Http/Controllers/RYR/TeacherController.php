<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryrTeachers;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama;
        $status = $request->status;


        // $teacher = ryrTeachers::all();
        $teachers = ryrTeachers::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', '%' . $search . '%');
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', 'like', '%' . $status . '%');
            })
            ->get();

        return view('dashboard.ryr.teachers.index', [
            'teachers' => $teachers,
        ]);
    }

    public function create()
    {
        return view('dashboard.ryr.teachers.create');
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
        ryrTeachers::create($input);

        // dd('ok');

        return redirect('/dashboard/ryr/teachers/index')->with('success', 'New Teacher has been added');
    }

    public function show($id)
    {
        $teacher = ryrTeachers::findOrFail($id);
        return view('dashboard.ryr.teachers.show', compact('ryrTeachers'));
    }

    public function edit($id)
    {
        $teacher = ryrTeachers::findOrFail($id);
        return view('dashboard.ryr.teachers.edit', [
            'teacher' => $teacher,
        ]);
    }

    public function update(Request $request, $id)
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

        // dd($input['join_date']);
        if ($input['join_date'] == null) {
            $request['join_date'] = now();
        }
        // $input['join_date'] = now();
        // dd($request['join_date']);
        $input['updated_at'] = now();
        $input = $request->all();

        $teacher = ryrTeachers::findOrFail($id);
        $teacher->update($input);

        return redirect()->route('dashboard.teachers.index');
    }

    public function destroy($id)
    {
        $teacher = ryrTeachers::findOrFail($id);
        $teacher->delete();

        return redirect()->route('dashboard.ryr.teachers.index');
    }
}
