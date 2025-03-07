<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryrClasses;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryrParticipants;
use App\Models\RYR\ryrTeachers;

class ClassController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama_kelas;
        $teacher = $request->teacher;
        $tipe = $request->tipe;


        // $class = ryrClasses::all();
        $classes = ryrClasses::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_kelas', 'like', '%' . $search . '%');
            })
            ->when($teacher, function ($query) use ($teacher) {
                return $query->where('teacher', 'like', '%' . $teacher . '%');
            })
            ->when($tipe, function ($query) use ($tipe) {
                return $query->where('tipe', 'like', '%' . $tipe . '%');
            })
            ->get();


        $teachers = ryrTeachers::where('status', 'Active')->get();
        return view('dashboard.ryr.classes.index', [

            'classes' => $classes,
            'teachers' => $teachers,
        ]);
    }

    public function create()
    {

        $teachers = ryrTeachers::where('status', 'Active')->get();
        return view('dashboard.ryr.classes.create', [
            'teachers' => $teachers,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama_kelas' => 'required',
            'teacher' => 'required',
            'day' => 'required',
            'schedule' => 'required',
            'biaya' => 'required',
            'tipe' => 'required',
            'description' => 'nullable',
        ]);
        // dd($input);
        $code = Str::random(5);
        $input['id'] = $input['teacher'] . '-' . $code;
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryrClasses::create($input);

        return redirect('/dashboard/ryr/classes')->with('success', 'New class has been added');
    }

    public function show($id)
    {
        $class = ryrClasses::findOrFail($id);
        return view('dashboard.ryr.classes.show');
    }

    public function edit($id)
    {
        $class = ryrClasses::findOrFail($id);

        $teachers = ryrTeachers::where('status', 'Active')->get();

        return view('dashboard.ryr.classes.edit', [
            'class' => $class,
            'teachers' => $teachers,
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'nama_kelas' => 'required',
            'teacher' => 'required',
            'day' => 'required',
            'schedule' => 'required',
            'biaya' => 'required',
            'tipe' => 'required',
            'description' => 'nullable',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $class = ryrClasses::findOrFail($id);
        $class->update($input);

        return redirect()->route('dashboard.ryr.classes.index');
    }

    public function destroy($id)
    {
        $class = ryrClasses::findOrFail($id);
        $class->delete();

        return redirect()->route('dashboard.ryr.classes.index');
    }
}
