<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $filename = time() . '_' . $request->file('image')->getClientOriginalName();
        // $request->file('image')->move(public_path('image'), $filename);
        $request->file('image')->storeAs('upload', $filename);
        return back();
    }
}
