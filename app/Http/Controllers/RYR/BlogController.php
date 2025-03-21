<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use App\Models\RYR\ryrBlogs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->title;
        $author = $request->author;
        $kategori = $request->kategori;


        // $blog = ryrBlogs::all();
        $blogs = ryrBlogs::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->when($author, function ($query) use ($author) {
                return $query->where('author', 'like', '%' . $author . '%');
            })
            ->when($kategori, function ($query) use ($kategori) {
                return $query->where('kategori', 'like', '%' . $kategori . '%');
            })
            ->get();

        return view('/ryr/blog', [

            'blogs' => $blogs,
        ]);
    }

    public function create()
    {

        return view('/ryr/blog-create', [
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'author' => 'required|string',
            'kategori' => 'required|string',
            'foto' => 'nullable|image',
        ]);
        // dd($input);

        $input['status'] = 'Active';
        $input['created_at'] = now();
        $input['updated_at'] = now();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $this->uploadFoto($request);
            $input['foto'] = 'portfolio2/img/blog/' . $request->file('foto')->hashName();
        }

        ryrBlogs::create($input);

        return redirect('/ryr/blog')->with('success', 'New article has been added');
    }

    public function show($id)
    {
        $blog = ryrBlogs::findOrFail($id);
        return view('/ryr/blogDetail');
    }

    public function edit($id)
    {
        $blog = ryrBlogs::findOrFail($id);
        return view('/ryr/blog-edit', [
            'blog' => $blog,
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'author' => 'required|string',
            'kategori' => 'required|string|default:RYR',
            'foto' => 'nullable|image',
        ]);

        $input['updated_at'] = now();
        $input = $request->all();

        $blog = ryrBlogs::findOrFail($id);

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if($blog->foto){
                $this->deleteFoto($blog->foto);
            }
            $this->uploadFoto($request);
            $input['foto'] = $request->file('foto')->hashName();
        }

        $blog->update($input);

        return redirect()->route('/ryr/blog');
    }

    public function destroy($id)
    {
        $blog = ryrBlogs::findOrFail($id);
        $blog->delete();

        return redirect()->route('/ryr/blog');
    }


    public function uploadFoto(Request $request)
    {

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {

            $file = $request->file('foto');


            $path = $file->store('portfolio2/img/blog', 'public');

            return response()->json(['path' => $path, 'message' => 'File uploaded successfully!']);
        }

        return response()->json(['message' => 'No valid image file found'], 400);
    }

    public function deleteFoto($filename)
    {
        $filePath = 'portfolio2/img/blog' . $filename;

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);

            return response()->json(['message' => 'File deleted successfully']);
        }

        return response()->json(['message' => 'File not found'], 404);
    }
}
