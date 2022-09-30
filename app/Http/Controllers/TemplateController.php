<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TemplateController extends Controller
{
    public function index(Template $templates)
    {
        $templates = Template::all();
        $data['templates'] = $templates;

        // dd($templates->toArray());

        return view('template.index', $data);
    }

    public function create()
    {
        return view('template.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'blade' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $object = [
            'blade' => $request->blade,
        ];

        if($request->has('image')) {
            $image = Storage::disk('uploads')->put('templates', $request->image);

            $object['image'] = $image;
        }

        Template::create($object);

        return redirect()->route('templates.index')->with('status', 'Data Templates berhasil ditambahkan!');

    }

    public function show(Template $templates)
    {

    }

    public function edit(Template $templates)
    {
        $data['templates'] = $templates;

        // dd($data);

        return view('template.edit', $data);
    }

    public function update(Request $request, Template $templates)
    {
        $validator = Validator::make($request->all(),[
            'blade' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $current = Template::findOrFail($templates->id);

        $object = [
            'blade' => $request->blade,
        ];

        if($request->has('image')) {
            $image = Storage::disk('uploads')->put('templates', $request->image);
            $object['image'] = $image;
            if ($current->image) {
                File::delete('./uploads/' . $current->image);
            }
        }

        $current->update($object);

        return redirect('templates');
    }

    public function delete(Template $templates)
    {
        File::delete('./uploads/' . $templates->image);
        Template::destroy($templates->id);

        return redirect()->back();
    }
}
