<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryr_class;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryr_participants;
use App\Models\RYR\ryr_teachers;

class ClassController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->nama_kelas;
        $teacher = $request->teacher;
        $tipe = $request->tipe;


        // $class = ryr_class::all();
        $classes = ryr_class::query()
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


            $teachers = ryr_teachers::where('status','Active')->get();
        return view('dashboard.ryr.classes.index',[

            'classes' => $classes,
            'teachers' => $teachers,
        ]);
    }

    public function create()
    {

        $teachers = ryr_teachers::where('status','Active')->get();
        return view('dashboard.ryr.classes.create',[
            'teachers' => $teachers,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama_kelas' => 'required',
            'teacher' => 'required',
            'schedule' => 'required',
            'biaya' => 'required',
            'tipe' => 'required',
            'description' => 'nullable',
        ]);
        // dd($input);
        $input['created_at'] = now();
        $input['updated_at'] = now();

        ryr_class::create($input);
        // ryr_participants::create([
        //     'id_kelas' => Str::random(10),
        //     'nama_kelas' => $input['nama_kelas'],
        //     'tipe' => $input['tipe'],
        //     'deskripsi' => $input['description'],
        // ]);

        // dd('ok');

        return redirect('/dashboard/ryr/classes')->with('success', 'New class has been added');
    }

    public function show($id)
    {
        $class = ryr_class::findOrFail($id);
        return view('dashboard.ryr.classes.show');
    }

    public function edit($id)
    {
        $class = ryr_class::findOrFail($id);

        $teachers = ryr_teachers::where('status','Active')->get();

        return view('dashboard.ryr.classes.edit',[
            'class' => $class,
            'teachers' => $teachers,
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'nama_kelas' => 'required',
            'teacher' => 'required',
            'schedule' => 'required',
            'biaya' => 'required',
            'tipe' => 'required',
            'description' => 'nullable',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $class = ryr_class::findOrFail($id);
        $class->update($input);

        return redirect()->route('dashboard.ryr.classes.index');
    }

    public function destroy($id)
    {
        $class = ryr_class::findOrFail($id);
        $class->delete();

        return redirect()->route('dashboard.ryr.classes.index');
    }
}
