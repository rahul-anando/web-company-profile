<?php

namespace App\Http\Controllers;

use App\Models\Galeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriesController extends Controller
{
    public function index()
    {
        $galeries = Galeries::get();
        return view('galeries.index', compact('galeries'));
    }

    public function create()
    {
        return view('galeries.create');
    }

    public function store(Request $request)
    {
        // ddd($request);

        // return $request->file('image')->store('post-images');

        $validatedData = $request->validate([
            'title'   => 'required|max:255',
            'slug'    => 'required|max:255',
            'image'   => 'image|file|max:1024',
            'status'  => 'required'
        ]);
        
        if ($request->has('image')) {
            $content = Storage::disk('uploads')->put('galeries', $request->image);

            $validatedData['content'] = $content;
        }

        Galeries::create($validatedData);

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
        return view('galeries.edit', compact('galeries'));
    }

    public function update(Request $request, Galeries $galeries)
    {
        // $galeries->update([
        //     'title' => request()->title,
        //     'slug' => request()->slug,
        //     'image' => request()->image,
        //     'status' => request()->status,
        // ]);

        $rules = [
            'title'   => 'required|max:255',
            'slug'    => 'required|max:255',
            'image'   => 'image|file|max:1024',
            'status'  => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Galeries::where('id', $galeries->id)
            ->update($validatedData);

        return redirect('g');
    }

    public function delete(Galeries $galeries)
    {
        if($galeries->image) {
            Storage::delete($galeries->image);
        }

        Galeries::destroy($galeries->id);

        return redirect()->back();

        // $galeries->delete();
    }
}
