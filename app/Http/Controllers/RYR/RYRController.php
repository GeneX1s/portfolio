<?php

namespace App\Http\Controllers\RYR;

use App\Models\ContactUS;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\RYR\ryrBlogs;
use App\Models\RYR\ryrClasses;
use App\Models\RYR\ryrGalleries;
use App\Models\RYR\ryrParticipants;
use App\Models\RYR\ryrTeachers;
use App\Models\RYR\ryrMembers;
use App\Models\RYR\ryrSchedules;

class RYRController extends Controller
{
    public function index(Request $request)
    {

        $user = auth()->user();
        $classes = ryrClasses::get();
        $schedules = $classes->unique('start_time')->pluck('start_time');
        $teachers = ryrTeachers::where('status', 'Active')->get();
        $participants = ryrParticipants::get();
        $specials = ryrSchedules::where('status', 'Ongoing')->where('tipe', 'Special')->where('tanggal','>=',Carbon::today())->get();
        $blogs = ryrBlogs::where('status', 'Active')->get();
        $galleries = ryrGalleries::get();
        $language = 'id';
        if($request->language){
            $language = $request->language;
        }

        // dd($specials);
        // dd(Carbon::parse(now())->format('Y-m-d'));
        return view('ryr/ryr', [
            'classes' => $classes,
            'schedules' => $schedules,
            'teachers' => $teachers,
            'participants' => $participants,
            'specials' => $specials,
            'user' => $user,
            'blogs' => $blogs,
            'galleries' => $galleries,
            'language' => $language,
        ]);
    }

    public function store(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required|min:1|max:90',
            'username' => 'required|unique:users',
            'nip' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'is_admin' => 'nullable',
        ]);
        $userData['password'] = Hash::make($userData['password']);

        User::create($userData);

        return redirect('/RYR/posts/employees')->with('success', 'New user has been added');
    }

    public function blogs(Request $request)
    {
        $blogs = ryrBlogs::where('status', 'Active')->get();
        return view('ryr/blogs', [
            'blogs' => $blogs,
        ]);
    }

    public function blogDetail(Request $request, $id)
    {
        $blog = ryrBlogs::where('id', $id)->first();
        return view('ryr/blog-detail', [
            'blog' => $blog,
        ]);
    }

    public function galleries(Request $request)
    {
        $galleries = ryrGalleries::get();
        return view('ryr/galleries', [
            'galleries' => $galleries,
        ]);
    }
}
