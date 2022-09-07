<?php

namespace App\Http\Controllers;

use App\Models\Galeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GaleriesController extends Controller
{
    public function index()
    {
        // $galeries = Galeries::get();
        // return view('index', compact('galeries'));

        $galeries = Galeries::get();
        $data['galeries'] = $galeries;
        return view('galeries.index', $data);
    }

    public function create()
    {
        return view('galeries.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title'   => 'required|max:255',
            'slug'    => 'required|max:255',
            'image'   => 'image|file|max:1024',
            'status'  => 'required'
        ]);

        $object = array(
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
        );

        if($request->has('image')) {
            $image = Storage::disk('uploads')->put('galeries', $request->image);

            $object['image'] = $image;
        }

        Galeries::create($object);

        return redirect('galeries')->with('success', 'Berhasil ditambahkan!');

        // $data = Galeries::create($request->all());

        // if($request->hasfile('image')) {
        //     $request->file('image')->move('image/', $request->file('image')->getClientOriginalName());
        //     $data->image = $request->file('image')->getClientOriginalName();
        //     $data->save();
        // }

        // return redirect('g');

        // Galeries::create([
        //     'title' => request()->title,
        //     'slug' => request()->slug,
        //     'image' => request()->image,
        //     'status' => request()->status,
        // ]);

    }

    public function show($id)
    {

    }

    public function edit(Galeries $galeries)
    {
        // return view('edit', compact('galeries'));
        $data['galeries'] = $galeries;
        return view('galeries.edit', $data);
    }

    public function update(Request $request, Galeries $galeries)
    {
        // $galeries->update([
        //     'title' => request()->title,
        //     'slug' => request()->slug,
        //     'image' => request()->image,
        //     'status' => request()->status,
        // ]);

        $request->validate([
            'title'   => 'required|max:255',
            'slug'    => 'required|max:255',
            'status'  => 'required'
        ]);

        $current = Galeries::findOrFail($galeries->id);

        $object = array(
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
        );

        if ($request->has('image')) {
            $image = Storage::disk('uploads')->put('galeries', $request->image);
            $object['image'] = $image;
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }

        $current->update($object);

        return redirect('galeries');
    }

    public function delete(Galeries $galeries)
    {
        File::delete('./uploads/' . $galeries->image);

        Galeries::destroy($galeries->id);

        return redirect()->back();

        // if($galeries->image) {
        //     Storage::delete($galeries->image);
        // }

        // Galeries::destroy($galeries->id);

        // return redirect()->back();

        // $galeries->delete();
    }
}
