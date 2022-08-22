<?php

namespace App\Http\Controllers;

use App\Models\Galeries;
use Illuminate\Http\Request;

class GaleriesController extends Controller
{
    public function index()
    {
        $galeries = Galeries::get();
        return view('index', compact('galeries'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title'   => 'required|string|max:255',
        //     'slug'    => 'required|string|max:255',
        //     'image'   => 'image|mimes:jpeg,jpg,png|max:1024',
        //     'status'  => 'required',
        // ]);

        // $data = Galeries::create($request->all());

        // if($request->hasfile('image')) {
        //     $request->file('image')->move('image/', $request->file('image')->getClientOriginalName());
        //     $data->image = $request->file('image')->getClientOriginalName();
        //     $data->save();
        // }

        // return redirect('g');
        Galeries::create([
            'title' => request()->title,
            'slug' => request()->slug,
            'image' => request()->image,
            'status' => request()->status,
        ]);

        return redirect('g');
    }


    // public function show($id)
    // {

    // }

    public function edit(Galeries $galeries)
    {
        return view('edit', compact('galeries'));
    }

    public function update(Galeries $galeries)
    {
        $galeries->update([
            'title' => request()->title,
            'slug' => request()->slug,
            'image' => request()->image,
            'status' => request()->status,
        ]);

        return redirect('g');
    }

    public function delete(Galeries $galeries)
    {
        $galeries->delete();
        return redirect()->back();
    }
}
