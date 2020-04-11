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
        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('image')) {
            foreach($request->file('image') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('upload', $filename);

                $gallery = new Gallery;
                $gallery->name = $filename;
                $gallery->save();
            }
        }
        return back()->with('status', 'The image was uploaded.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        Storage::delete('upload/' . $gallery->name);
        $gallery->delete();
        return back()->with('status', 'The image was deleted.');;
    }

    public function download($id)
    {
        $gallery = Gallery::find($id);
        return Storage::download('upload/' . $gallery->name);
    }
}
