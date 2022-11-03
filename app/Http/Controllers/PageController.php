<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use App\Models\Template;
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
            'title' => 'required',
            'slug' => 'required',
            'meta' => 'required',
            'image' => 'image|file|max:1024',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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

        // dd($request->toArray());

        Page::create($object);

        return redirect()->route('pages.index')->with('status', 'Data Pages berhasil ditambahkan!');
    }

    public function show(Page $pages, Section $sections, Template $templates)
    {
        $current = Page::findOrFail($pages->id);
        $sections = Section::all();
        $templates = Template::all();
        // $pages = Page::all();
        $data['pages'] = $pages;
        $data['templates'] = $templates;
        $data['sections'] = $sections;

        return view('page.manage', $current, $data);
    }

    public function edit(Page $pages)
    {
        // $sections = Section::all();
        // $pages = Page::all();
        $data['pages'] = $pages;
        // $data['sections'] = $sections;

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

        return redirect('pages')->with('status', 'Data Pages berhasil diupdate!');
    }

    public function delete(Page $pages)
    {
        File::delete('./uploads/' . $pages->image);
        Page::destroy($pages->id);

        return redirect()->back()->with('status', 'Data Pages berhasil dihapus.');
    }

    public function back(Request $request, Page $pages, Section $sections, Template $templates)
    {
        $sections = Section::all();
        $templates = Template::all();
        // $pages = Page::all();
        $data['pages'] = $pages;
        $data['templates'] = $templates;
        $data['sections'] = $sections;

        return view('page.manage', ['page' => $request->page_id], $data);
    }
}
