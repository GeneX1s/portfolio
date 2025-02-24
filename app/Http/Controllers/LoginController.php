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
    $failcount = UserLog::where('user_ip', $clientIP)
      ->where('status', 'Failed')
      ->count();

    // If there are more than 2 failed attempts, deny access
    if ($failcount > 3) {
      return response()->json(['message' => 'Access Denied'], 403); // HTTP 403 Forbidden
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
      return redirect()->intended('/dashboard');
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

    $id = Auth::id();
    $user = User::where('id', $id)->first();

    $request->validate([
      'password' => 'required',
    ]);
    $input = $request->all();
    $password = bcrypt($input['password']);
    $user->update([
      'email' => $input['email'],
      'password' => $password,
    ]);

    // Redirect or respond as needed
    return redirect()->back()->with('success', 'Value updated successfully.');
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
