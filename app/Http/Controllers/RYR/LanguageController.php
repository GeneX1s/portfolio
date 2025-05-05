<?php

namespace App\Http\Controllers\RYR;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function set(Request $request)
    {
        $lang = $request->language ?? 'id';
        session(['language' => $lang]);
        // dd($lang);
        return redirect()->back(); // Return to previous page
    }
}
