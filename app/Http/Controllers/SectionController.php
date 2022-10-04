<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Page;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $data['sections'] = $sections;

        return view('section.index', $data);
    }

    public function create()
    {
        $sections = Section::all();
        $pages = Page::all();
        $templates = Template::all();
        $data['sections'] = $sections;
        $data['pages'] = $pages;
        $data['templates'] = $templates;

        // dd($data);

        return view('section.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'index' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $object = [
            'name' => $request->name,
            'slug' => $request->slug,
            'content' => $request->content,
            'index' => $request->index,
        ];

        // if ($request->has('content')) {
        //     $content = Storage::disk('uploads')->put('sections', $request->content);

        //     $json = [
        //         'image' => $content,
        //     ];

        //     $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);
        // }

        Section::create($object);

        return redirect()->route('sections.index')->with('status', 'Data Section berhasil ditambahkan!');
    }

    public function show($id)
    {

    }

    public function edit(Section $sections)
    {
        $data['sections'] = $sections;

        return view('section.edit', $data);
    }

    public function update(Request $request, Section $sections)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'index' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $current = Section::findOrFail($sections->id);

        $object = [
            'name' => $request->name,
            'slug' => $request->slug,
            'content' => $request->content,
            'index' => $request->index,
        ];

        // if ($request->has('content') == null) {
        //     $content = json_decode($current->content, true);
        //     $json = [
        //         'image' => $content['image'],
        //     ];
        //     $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);
        // } else if ($request->has('content')) {
        //     $content = Storage::disk('uploads')->put('sections', $request->content);

        //     $json = [
        //         'image' => $content,
        //     ];

        //     $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

        //     if ($current->content) {
        //         $content = json_decode($current->content, true);
        //         File::delete('./uploads/' . $content['image']);
        //     }
        // }

        $current->update($object);

        return redirect('sections');

    }

    public function delete(Section $sections)
    {
        Section::destroy($sections->id);
        return redirect()->back();
    }
}
