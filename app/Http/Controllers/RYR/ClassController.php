<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryrClasses;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryrParticipants;
use App\Models\RYR\ryrTeachers;
use Illuminate\Support\Facades\Storage;

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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        // dd($input);
        $code = Str::random(5);
        $input['id'] = $input['teacher'] . '-' . $code;
        $input['created_at'] = now();
        $input['updated_at'] = now();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $this->uploadFoto($request);
            $input['foto'] = 'portfolio2/img/class/' . $request->file('foto')->hashName();
        }

        ryrClasses::create($input);

        return redirect('/dashboard/ryr/classes')->with('success', 'New class has been added');
    }

    public function show($id)
    {
        // dd('us');
        $class = ryrClasses::findOrFail($id);
        return view('dashboard.ryr.classes.show');
    }

    public function edit($id)
    {
        $class = ryrClasses::findOrFail($id);

        $teachers = ryrTeachers::where('status', 'Active')->get();
// dd('ci');
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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        dd('hi');
        $input['updated_at'] = now();
        $input = $request->all();

        $class = ryrClasses::findOrFail($id);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if($class->foto){
                $this->deleteFoto($class->foto);
            }
            $this->uploadFoto($request);
            $input['foto'] = $request->file('foto')->hashName();
        }

        $class->update($input);

        return redirect()->route('classes.index');
    }

    public function destroy($id)
    {
        $class = ryrClasses::findOrFail($id);
        $class->delete();

        return redirect()->route('classes.index');
    }


    public function uploadFoto(Request $request)
    {

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $file = $request->file('foto');


            $path = $file->store('portfolio2/img/class', 'public');

            return response()->json(['path' => $path, 'message' => 'File uploaded successfully!']);
        }

        return response()->json(['message' => 'No valid image file found'], 400);
    }

    public function deleteFoto($filename)
    {
        // Define the file path relative to the public storage
        $filePath = 'portfolio2/img/class' . $filename;
        // $filePath = $filename;

        // Check if the file exists
        if (Storage::disk('public')->exists($filePath)) {
            // Delete the file
            Storage::disk('public')->delete($filePath);

            return response()->json(['message' => 'File deleted successfully']);
        }

        return response()->json(['message' => 'File not found'], 404);
    }
}
