<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::all(); 
        return view('table', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('poto');
        }
        // return $request->file('image')->store('images');

        Articles::create($validatedData);
        return redirect('index');
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
    public function edit(Articles $articles)
    {
        return view('edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {
        dd($request->all());
        $rules = [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required',
            // 'status' => 'required'
        ];
        // $validatedData = $request->validate([
        //     'title' => 'required',
        //     'slug' => 'required',
        //     'content' => 'required',
        //     'image' => 'required',
        //     'author' => 'required'
        // ]);


        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if($request->OldImage){
                Storage::delete($request->OldImage);
            }

            $validatedData['image'] = $request->file('image')->store('poto');
        }

        
        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('poto');
        // }

        // dd($validatedData);

        Articles::where('id', $articles->id)
            ->update($validatedData);

        return redirect('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Articles $articles)
    {
        $articles->delete();
        return redirect()->back();
    }

}
