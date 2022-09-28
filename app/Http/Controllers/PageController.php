<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $data['pages'] = $pages;

        return view('page.index', $data);
    }

    public function create()
    {
        return view('page.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'slug' => 'required',
            'meta' => 'required',
            'image' => 'image|file|max:1024',
            'status' => 'required',
        ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $object = [
            'title' => $request->title,
            'slug' => $request->slug,
            'meta' => $request->meta,
            'status' => $request->status,
        ];

        if($request->has('image')) {
            $image = Storage::disk('uploads')->put('pages', $request->image);

            $object['image'] = $image;
        }

        // dd($object);

        Page::create($object);

        return redirect()->route('pages.index')->with('status', 'Data Pages berhasil ditambahkan!');
    }

    public function show(Page $page)
    {

    }

    public function edit(Page $pages)
    {
        $data['pages'] = $pages;

        return view('page.edit', $data);
    }

    public function update(Request $request, Page $pages)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'slug' => 'required',
            'meta' => 'required',
            'image' => 'image|file|max:1024',
            'status' => 'required',
        ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $current = Page::findOrFail($pages->id);

        $object = [
            'title' => $request->title,
            'slug' => $request->slug,
            'meta' => $request->meta,
            'status' => $request->status,
        ];

        if($request->has('image')) {
            $image = Storage::disk('uploads')->put('pages', $request->image);
            $object['image'] = $image;
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }

        $current->update($object);

        return redirect('pages');
    }

    public function delete(Page $pages)
    {
        File::delete('./uploads/' . $pages->image);
        Page::destroy($pages->id);

        return redirect()->back();
    }
}