<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\ContactUS;
use Illuminate\Support\Facades\Mail;

class ContactUSController extends Controller
{
    public function contactUS()
    {
        $messages = ContactUS::get();
        return view('dashboard.contactus.index', [
            'messages' => $messages
        ]);
    }

    public function store(Request $request)
    {

        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'status' => 'nullable'
        ]);

        $input['status'] = 'unread';

        ContactUS::create($input);

        return redirect('/portfolio#contact')->with('success', 'Thanks for reaching out!');
    }
}
