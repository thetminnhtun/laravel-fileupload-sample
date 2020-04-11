<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('home', compact('galleries'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('image')) {
            foreach($request->file('image') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('upload', $filename);

                $gallery = new Gallery;
                $gallery->name = $filename;
                $gallery->save();
            }
        }
        return back();
    }
}
