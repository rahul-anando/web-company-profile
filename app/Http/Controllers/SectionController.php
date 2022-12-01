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

    public function create(Section $sections, Page $pages, Template $templates)
    {
        // $pages = Page::with(relations: 'sections')->get();
        // $data['pages'] = $pages;
        // $data['sections'] = $sections;

        // return view('section.create', $data);
    }

    public function store(Request $request, Page $pages, Section $section, Template $templates)
    {
        $validator = Validator::make($request->all(),[
            'index' => 'required',
            'name' => 'required',
            'slug' => 'required',
            // 'content' => 'required',
            // 'title' => 'required',
            // 'title_h4' => 'required',
            // 'title_h1' => 'required',
            // 'content[0][image]' => 'required|image|file|max:1024',
            // 'content[0][image_name]' => 'required',
            // 'content[0][image_excerpt]' => 'required',
            // 'excerpt' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $object = [
            'name' => $request->name,
            'slug' => $request->slug,
            // 'content' => $request->content,
            'page_id' => $request->page_id,
            'template_id' => $request->template_id,
            'index' => $request->index,
        ];

        if ($request->has('content')) {
            $content1 = Storage::disk('uploads')->put('sections', $request->content[0]['image']);

            if ($request->template_id == 1)
            {
                $content[0]['image'] = $content1;
                $content[0]['image_name'] = $request->content[0]['image_name'];

                $json = [
                    'title_h4' => $request->title_h4,
                    'title_h1' => $request->title_h1,
                    'content' => $content,
                    // 'image[name]' => $request->content->getClientOriginalName()

                ];
            }
            elseif ($request->template_id == 2)
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
            elseif ($request->template_id == 4)
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

    public function edit($id)
    {
        $sections = Section::where('id', $id)->with('template')->first();

        $blade = 'section.edit.'. $sections->template->blade;

        $data['sections'] = $sections;

        return view($blade, $data);
        // dd($blade);
    }

    public function update(Request $request, Section $sections)
    {
        $validator = Validator::make($request->all(),[
            'index' => 'required',
            'name' => 'required',
            'slug' => 'required',
            // 'content' => 'required',
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
            // 'content' => $request->content,
            'page_id' => $request->page_id,
            'template_id' => $request->template_id,
            'index' => $request->index,
        ];

        if ($request->template_id == 1 ) {
            if ($request->file('content') == null) {
                $content = json_decode($current->content, true);

                $content1 = [
                    [
                        'image' => $content['content'][0]['image'],
                        'image_name' => $request->content[0]['image_name']
                    ]
                ];

                $json = [
                    'title_h4' => $request->title_h4,
                    'title_h1' => $request->title_h1,
                    'content'  => $content1,
                ];
                $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);
            } else if ($request->file('content')) {
                $content1 = Storage::disk('uploads')->put('sections', $request->content[0]['image']);

                $content[0]['image'] = $content1;
                $content[0]['image_name'] = $request->content[0]['image_name'];

                $json = [
                    'title_h4' => $request->title_h4,
                    'title_h1' => $request->title_h1,
                    'content'  => $content,
                ];

                $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

                if ($current->content) {
                    $content = json_decode($current->content, true);
                    File::delete('./uploads/' . $content['content'][0]['image']);
                }
            }

        }  else if ($request->template_id == 2 ) {
            if ($request->file('content') == null) {
                $content = json_decode($current->content, true);

                $content1 = [
                    [
                        'image' => $content['content'][0]['image'],
                        'image_name' => $request->content[0]['image_name'],
                        'image_excerpt' => $request->content[0]['image_excerpt']
                    ]
                ];

                $json = [
                    'title' => $request->title,
                    'excerpt' => $request->excerpt,
                    'content' => $content1,
                ];
                $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

            } else if ($request->file('content')) {
                $content1 = Storage::disk('uploads')->put('sections', $request->content[0]['image']);

                $content[0]['image'] = $content1;
                $content[0]['image_name'] = $request->content[0]['image_name'];
                $content[0]['image_excerpt'] = $request->content[0]['image_excerpt'];

                $json = [
                    'title' => $request->title,
                    'excerpt' => $request->excerpt,
                    'content' => $content,
                ];

                $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

                if ($current->content) {
                    $content = json_decode($current->content, true);
                    File::delete('./uploads/' . $content['content'][0]['image']);
                }
            }

        } else if ($request->template_id == 3 ) {

            $json = [
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'button_text' => $request->button_text,
                'button_link' => $request->button_link
            ];
            $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

        } else if ($request->template_id == 4 ) {

            if ($request->file('content') == null) {
                $content = json_decode($current->content, true);

                $content1 = [
                    [
                        'image' => $content['content'][0]['image'],
                        'image_name' => $request->content[0]['image_name'],
                        'image_desc' => $request->content[0]['image_desc']
                    ]
                ];

                $json = [
                    'title' => $request->title,
                    'content' => $content1,
                ];
                $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);
            } else if ($request->file('content')) {
                $content1 = Storage::disk('uploads')->put('sections', $request->content[0]['image']);

                $content[0]['image'] = $content1;
                $content[0]['image_name'] = $request->content[0]['image_name'];
                $content[0]['image_desc'] = $request->content[0]['image_desc'];

                $json = [
                    'title' => $request->title,
                    'content' => $content,
                ];

                $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

                if ($current->content) {
                    $content = json_decode($current->content, true);
                    File::delete('./uploads/' . $content['content'][0]['image']);
                }
            }
        }

        // dd($object);
        $current->update($object);

        return redirect()->route('pages.back', ['page' => $request->page_id])->with('status', 'Data Section berhasil diupdate!');
        // return redirect('sections')->with('status', 'Data Section berhasil diupdate!');
    }

    public function delete(Section $sections)
    {
        $current = json_decode($sections->content, true);

        if (isset($current['content'])) {
            File::delete('./uploads/' . $current['content'][0]['image']);
            Section::destroy($sections->id);
        } else {
            Section::destroy($sections->id);
        }

        return redirect()->back();
    }

    public function add_section(Request $request, Template $templates)
    {
        // $sections = Section::all();
        // $pages = Page::all();
        $templates = Template::where('id', $request->template_id)->first();

        $blade = 'template.blade.'. $templates->blade;

        // $data['sections'] = $sections;
        // $data['pages'] = $pages;
        $data['templates'] = $templates;

        return view($blade, ['page_id' => $request->page_id], $data);
    }

}
