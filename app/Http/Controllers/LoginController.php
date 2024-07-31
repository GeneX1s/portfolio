<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;

class LoginController extends Controller
{
  public function index()
  {
    $clientIP = request()->ip();
    
    // Count the number of failed attempts for the client's IP address
    $failcount = Session::where('user_ip', $clientIP)
    ->where('status', 'Failed')
    ->count();
    
    // If there are more than 2 failed attempts, deny access
    if ($failcount > 2) {
      return response()->json(['message' => 'Access Denied'], 403); // HTTP 403 Forbidden
}
// Otherwise, show the login view
return view('login', [
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
          Session::create([
              'email' => $request->email,
              'user_ip' => $clientIP,
              'status' => "Success",
          ]);
          // Redirect to intended page or dashboard
          return redirect()->intended('/dashboard');
      }
  
      // Record failed login attempt
      Session::create([
          'email' => $request->email,
          'user_ip' => $clientIP,
          'status' => "Failed",
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

    return redirect('/');
  }
}
