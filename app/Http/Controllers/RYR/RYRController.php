<?php

namespace App\Http\Controllers;

use App\Models\ContactUS;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Audit;
use App\Models\RYR\ryrAttendances;
use App\Models\RYR\ryrClasses;
use App\Models\RYR\ryrParticipants;
use App\Models\RYR\ryrTeachers;
use App\Models\RYR\ryrMembers;
use App\Models\RYR\ryrSchedules;

class RYRController extends Controller
{
    public function index(Request $request)
    {

        $user = auth()->user();
        $classes = ryrClasses::where('status', 'Active')->get();
        $teachers = ryrTeachers::where('status', 'Active')->get();
        $participants = ryrParticipants::where('status', 'Active')->get();
        $specials = ryrSchedules::where('status', 'Active')->tipe('Special')->get();


        return view('/ryr/ryr', [
            'classes' => $classes,
            'teachers' => $teachers,
            'participants' => $participants,
            'specials' => $specials,
            'user' => $user,

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

}
