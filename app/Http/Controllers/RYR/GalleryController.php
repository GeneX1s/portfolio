<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RYR\ryrGalleries;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    public function index(Request $request)
    {

        // $search = $request->nama_kelas;
        $kategori = $request->kategori;


        // $gallery = ryrGalleries::all();
        $galleries = ryrGalleries::query()
            ->when($kategori, function ($query) use ($kategori) {
                return $query->where('kategori', 'like', '%' . $kategori . '%');
            })
            ->get();


        return view('ryr/gallery', [

            'galleries' => $galleries,
        ]);
    }

    public function create()
    {

        return view('ryr.galleries.create', [
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required|string',
            'kategori' => 'nullable|string|default:RYR',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);
        // dd($input);]
        $input['created_at'] = now();
        $input['updated_at'] = now();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $this->uploadFoto($request);
            $input['foto'] = 'portfolio2/img/gallery/' . $request->file('foto')->hashName();
        }

        ryrGalleries::create($input);

        return redirect('/ryr/gallery')->with('success', 'New photo has been added');
    }


    public function edit($id)
    {
        $gallery = ryrGalleries::findOrFail($id);

        return view('ryr.galleries.edit', [
            'gallery' => $gallery,
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'nama' => 'required|string',
            'kategori' => 'nullable|string|default:RYR',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $gallery = ryrGalleries::findOrFail($id);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if($gallery->foto){
                $this->deleteFoto($gallery->foto);
            }
            $this->uploadFoto($request);
            $input['foto'] = $request->file('foto')->hashName();
        }

        $gallery->update($input);

        return redirect()->route('ryr.gallery');
    }

    public function destroy($id)
    {
        $gallery = ryrGalleries::findOrFail($id);
        $gallery->delete();

        return redirect()->route('ryr.gallery');
    }


    public function uploadFoto(Request $request)
    {

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $file = $request->file('foto');


            $path = $file->store('portfolio2/img/gallery', 'public');

            return response()->json(['path' => $path, 'message' => 'File uploaded successfully!']);
        }

        return response()->json(['message' => 'No valid image file found'], 400);
    }

    public function deleteFoto($filename)
    {
        $filePath = 'portfolio2/img/gallery' . $filename;

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return response()->json(['message' => 'File deleted successfully']);
        }

        return response()->json(['message' => 'File not found'], 404);
    }
}
