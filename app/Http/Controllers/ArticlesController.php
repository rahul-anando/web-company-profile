<?php

namespace App\Http\Controllers;

use App\models\articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = articles::all();
        return view('table', compact('articles'));
    }

    public function create()
    {
        return View('create');
    }

    public function store(Request $request)
    {
        articles::create([
            'title' =>request()->title,
            'slug' =>request()->slug,
            'content' =>request()->content,
            'image' =>request()->image,
            'author' =>request()->author,

        ]);

        return redirect('index');
    }

    public function edit(Articles $articles)
    {
        return view('edit', compact('articles'));
    }

    public function update(Articles $articles)
    {
        $articles->update([
            'title' =>request()->title,
            'slug' =>request()->slug,
            'content' =>request()->content,
            'image' =>request()->image,
            'author' =>request()->author,
        ]);
        return redirect('index');
    }

    public function delete(Articles $articles)
    {
        $articles->delete();
        return redirect()->back();
    }
}

