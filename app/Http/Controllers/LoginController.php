<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserLog;

class LoginController extends Controller
{
    public function index()
    {
        $clientIP = request()->ip();

        // Count the number of failed attempts for the client's IP address
        $fails = UserLog::where('user_ip', $clientIP)
            ->where('status', 'Failed')
            ->where('created_at', '>', now()->subMinutes(5))
            ->get();

        $failcount = $fails->count();
        // dd($failcount);
        // If there are more than 2 failed attempts, deny access
        if ($failcount > 3) {
            return response()->json(['message' => 'Access Denied'], 403); // HTTP 403 Forbidden
        }


        foreach ($fails as $fail) {
            if ($fail->created_at < now()->subMinutes(5)) {
                $fail->delete();
            }
        }
        // Otherwise, show the login view
        return view('/login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {

        // Retrieve client's IP address
        $clientIP = $request->ip();

        // Validate the login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            // Record successful login attempt
            UserLog::create([
                'email' => $request->email,
                'user_ip' => $clientIP,
                'status' => "Success",
                'created_at' => now(),
            ]);

            // Redirect to intended page or dashboard
            // return redirect()->intended('/dashboard');
            return redirect('/dashboard');
        }

        // Record failed login attempt
        UserLog::create([
            'email' => $request->email,
            'user_ip' => $clientIP,
            'status' => "Failed",
            'created_at' => now(),
        ]);

        // Redirect back with an error message
        return back()->withErrors([
            'loginError' => 'Login failed! Please check your credentials and try again.',
        ])->onlyInput('email'); // Retain the email input in case of failure


    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function manage()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        return view('dashboard.users.manage', [
            'title' => 'User Settings',
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('dashboard.users.create', [
            'title' => 'Create'
        ]);
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $input = $request->all();
        $password = bcrypt($input['password']);
        User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => $password,
            'role' => $input['role'],
            'created_at' => now(),
        ]);


        // Redirect or respond as needed
        return redirect('/dashboard/users/index')->with('success', 'New user has been added.');
    }

    public function update(Request $request, User $user)
    {


        $input = $request->all();

        $id = Auth::id();
        // dd($user['id']);
        if ($user['id'] != null) {
            $user = User::where('id', $user['id'])->first();
            $redirect = '/dashboard/users/index';
        } else {
            $user = User::where('id', $id)->first();
            $input['username'] = $user->username;
            $input['email'] = $user->email;
            $input['role'] = $user->role;
            $redirect = '/dashboard/users/manage';
        }

        if ($user->role == 'finance') {
            // if ($user->wasChanged()) {
            if ($user->updated_at == '2001-01-01 00:00:00') {
                // dd('hi');
                return redirect()->back()->with('error', 'Action forbidden.');
            }
        }

        if ($user->role == 'finance') {
            $input['updated_at'] = '2001-01-01';
        } else {
            $input['updated_at'] = now();
        }
        $password = bcrypt($input['password']);
        $user->update([
            // 'email' => $input['email'],
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => $password,
            'role' => $input['role'],
            'updated_at' => $input['updated_at'],
        ]);



        // Redirect or respond as needed
        return redirect($redirect)->with('success', 'User updated.');
    }

    public function list(Request $request)
    {

        $users = User::get();

        return view('dashboard.users.index', [
            'users' => $users,
        ]);
    }

    public function destroy(User $user)
    {

        $user = User::where('id', $user->id)->first()->delete();

        // Redirect or respond as needed

        return redirect()->back()->with('success', 'User Deleted successfully.');
    }

    public function attempt(Request $request)
    {

        $attempts = UserLog::get();

        return view('dashboard.users.attempt', [
            'attempts' => $attempts,
        ]);
    }
}
