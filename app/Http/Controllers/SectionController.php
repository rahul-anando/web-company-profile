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
        $pages = Page::all();
        // $sections = Section::with('page')->get();
        $data['sections'] = $sections;
        $data['pages'] = $pages;

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

    public function store(Request $request, Page $pages, Section $section)
    {
        // $validator = Validator::make($request->all(),[
        //     'name' => 'required',
        //     'slug' => 'required',
        //     'content' => 'required',
        //     'index' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $object = [
            'name' => $request->name,
            'slug' => $request->slug,
            // 'content' => $request->content,
            'page_id' => $request->page_id,
            'template_id' => $request->template_id,
            'index' => $request->index,
            'data_id' => $request->data_id,
        ];

        if ($request->has('content')) {
            $content1 = Storage::disk('uploads')->put('sections', $request->content[0]['image']);


            if ($request->data_id == 1)
            {
                $content[0]['image'] = $content1;
                $content[0]['image_name'] = $request->content[0]['image_name'];

                $json = [
                    'title_h4' => $request->title_h4,
                    'title_h1' => $request->title_h1,
                    'content' => $content,
                    // 'image[name]' => $request->content->getClientOriginalName()

                    // $image = [
                    //     'content[image]' => $content,
                        // 'content[image_name]' => $request->content
                    // ]
                ];
            }
            elseif ($request->data_id == 2)
            {
                $content[0]['image'] = $content1;
                $content[0]['image_name'] = $request->content[0]['image_name'];
                $content[0]['image_excerpt'] = $request->content[0]['image_excerpt'];

                $json = [
                    'title' => $request->title,
                    'excerpt' => $request->excerpt,
                    'content' => $content,
                ];
            }
            // elseif ($request->data_id == 3)
            // {
            //     $json = [
            //         'title' => $request->title,
            //         'excerpt' => $request->excerpt,
            //         'button_text' => $request->button_text,
            //         'button_link' => $request->button_link
            //     ];
            // }
            elseif ($request->data_id == 4)
            {
                $content[0]['image'] = $content1;
                $content[0]['image_name'] = $request->content[0]['image_name'];
                $content[0]['image_desc'] = $request->content[0]['image_desc'];
                $json = [
                    'title' => $request->title,
                    'content' => $content,
                ];
            }

            $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

        } else {
            $json = [
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'button_text' => $request->button_text,
                'button_link' => $request->button_link
            ];

            $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);
        }

        // dd($object);
        Section::create($object);

        return redirect()->route('pages.back', ['page' => $request->page_id])->with('status', 'Data Section berhasil ditambahkan!');
        // return redirect('pages/show/', )->with('status', 'Data Section berhasil ditambahkan!');
    }

    public function show($id)
    {
    }

    public function edit(Section $sections, Page $pages, Template $templates)
    {
        $pages = Page::all();
        $templates = Template::all();
        $data['sections'] = $sections;

        return view('section.edit.slider', $data);
    }

    public function update(Request $request, Section $sections)
    {
        // $validator = Validator::make($request->all(),[
        //     'name' => 'required',
        //     'slug' => 'required',
        //     'content' => 'required',
        //     'index' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $current = Section::findOrFail($sections->id);

        $object = [
            'name' => $request->name,
            'slug' => $request->slug,
            // 'content' => $request->content,
            'page_id' => $request->page_id,
            'template_id' => $request->template_id,
            'index' => $request->index,
            'data_id' => $request->data_id,
        ];

        if ($request->has('content') == null) {
            $content = json_decode($current->content, true);
            $json = [
                'title_h4' => $request->title_h4,
                'title_h1' => $request->title_h1,
                'content' => $content,            ];
            $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);
        } else if ($request->has('content')) {
            $content1 = Storage::disk('uploads')->put('sections', $request->content[0]['image']);

            $content[0]['image'] = $content1;
            $content[0]['image_name'] = $request->content[0]['image_name'];

            $json = [
                'title_h4' => $request->title_h4,
                'title_h1' => $request->title_h1,
                'content' => $content,
            ];

            $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

            if ($current->content) {
                $content = json_decode($current->content, true);
                File::delete('./uploads/' . $content['content'][0]['image']);
            }
        }

        $current->update($object);

        return redirect()->route('pages.back', ['page' => $request->page_id])->with('status', 'Data Section berhasil diupdate!');
        // return redirect('sections')->with('status', 'Data Section berhasil diupdate!');
    }

    public function delete(Section $sections)
    {
        Section::destroy($sections->id);
        return redirect()->back();
    }

    public function add(Request $request, Page $pages, Template $templates, Section $section)
    {
        $sections = Section::all();
        $pages = Page::get();
        $templates = Template::get();
        $data['sections'] = $sections;
        $data['pages'] = $pages;
        $data['templates'] = $templates;

        if ($request->data_id == 1) {
            return view('template.blade.slider', $data,
            ['data_id' => $request->data_id]);
        } elseif ($request->data_id == 2) {
            return view('template.blade.service', $data,
            ['data_id' => $request->data_id]);
        } elseif ($request->data_id == 3) {
            return view('template.blade.about', $data,
            ['data_id' => $request->data_id]);
        } elseif ($request->data_id == 4) {
            return view('template.blade.review', $data,
            ['data_id' => $request->data_id]);
        }
        // } elseif ($request->data_id == 5) {
        //     return view('template.blade.header', $data);
        // } elseif ($request->data_id == 6) {
        //     return view('template.blade.footer', $data);
        // } elseif ($request->data_id == 7) {
        //     return view('template.blade.kontak', $data);
        // }
    }
}
