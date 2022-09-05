<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pages()
    {
        $pages = Pages::all();
        return view('pages', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('images');

        // $pages = new Pages;
        // $pages->title = $request->input('title');
        // $pages->slug = $request->input('slug');
        // $pages->content = $request->input('content');
        // $pages->image = $request->input('image');
        // $pages->status = $request->input('status');
        // $pages->save();
        // if($request->hasfile('image'))
        // {
        //     $file = $request->file('image')->store('images');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('uploads/images/', $filename);
        //     $pages->image = $filename;
        // }


        $validateddata = $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255',
            'content'    => 'required',
            'image'    => 'image|mimes:jpeg,jpg,png|max:1024',
            'status'    => 'required',
        ]);

        if($request->file('image')) {
            $validateddata['image'] = $request->file('image')->store('images');
        }
        Pages::create($validateddata);
        return redirect('pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pages $pages)
    {
        return view('edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Pages $pages)
    {
        $rules = [
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255',
            'content'    => 'required',
            'image'    => 'image|mimes:jpeg,jpg,png|max:1024',
            'status'    => 'required',
        ];


        $validateddata =$request->validate($rules);
        if($request->file('image')) {
            $validateddata['image'] = $request->file('image')->store('images');
        }
        Pages::where('id', $pages->id)
            ->update($validateddata);

        return redirect('pages');
        // return $request->file('image')->store('images');
        // $pages = Pages::find($id);
        // $pages->title = $request->input('title');
        // $pages->slug = $request->input('slug');
        // $pages->content = $request->input('content');
        // if($request->hasfile('image'))
        // {
        //     $delete = 'uploads/images/'.$pages->image;
        //     if(File::exists($delete))
        //     {
        //         File::delete($delete);
        //     }
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('uploads/images/', $filename);
        //     $pages->image = $filename;
        // }
        // $pages->status = $request->input('status');
        // $pages->update();
        // return redirect('pages');
        // {
        //     $pages->update([
        //         'title' => request()->title,
        //         'slug' => request()->slug,
        //         'content' => request()->content,
        //         'image' => request()->image,
        //         'status' => request()->status,
        //     ]);

        //     return redirect('/pages');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
            $pages = Pages::find($id);
            $delete = 'storage/'.$pages->image;
            if(File::exists($delete))
            {
                File::delete($delete);
            }
            $pages->delete();
            return redirect('pages');
        }
    public function delete(Pages $pages)
    {
        if($pages->oldImage) {
            Storage::delete($pages->oldImage);
        }
        Pages::destroy($pages->id);
        return redirect()->back();
    }
}
