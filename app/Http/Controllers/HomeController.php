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
        if($request->hasFile('image')) {
            foreach($request->file('image') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('upload', $filename);
            }
        }
        return back();
    }
}
