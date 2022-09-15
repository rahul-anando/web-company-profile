<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $data['posts'] = $posts;

        // foreach ($posts as $post) {
        //     $content = json_decode($post->content, true);
        //     // echo $content['image'];
        // }
        // exit();

        // dd($posts->toArray());
        return view('postIndex', $data);
    }

    public function create()
    {
        return view('createPost');
    }

    public function store(Request $request)
    {
        // $input = $request->all();

        $object = [
            'name' => $request->name,
            'slug' => $request->slug,
            // 'content' => $request->content,
        ];

        if ($request->description == null) {
            $desc = "";
        } else {
            $desc = $request->description;
        }

        if ($request->has('content')) {
            $content = Storage::disk('uploads')->put('post', $request->content);

            $json = [
                'image' => $content,
                'description' => $desc
            ];

            $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);
        }

        // dd($object);

        Post::create($object);

        return redirect()->route('posts.index');
    }

    public function show($id)
    {

    }

    public function edit(Post $posts)
    {
        $data['posts'] = $posts;
        // dd($posts->toArray());
        return view('editPost', $data);
    }

    public function update(Request $request, Post $posts)
    {
        $current = Post::findOrFail($posts->id);

        // dd($current->toArray());

        $object = [
            'name' => $request->name,
            'slug' => $request->slug,
            // 'content' => $request->content,
        ];

        if ($request->description == null) {
            $desc = "";
        } else {
            $desc = $request->description;
        }

        if ($request->has('content') == null) {
            $content = json_decode($current->content, true);
            $json = [
                'image' => $content['image'],
                'description' => $desc
            ];
            $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);
        } else if ($request->has('content')) {
            $content = Storage::disk('uploads')->put('post', $request->content);

            $json = [
                'image' => $content,
                'description' => $request->desciption
            ];

            $object['content'] = json_encode($json, JSON_UNESCAPED_SLASHES);

            if ($current->content) {
                $content = json_decode($current->content, true);
                File::delete('./uploads/' . $content['image']);
            }
        }

        $current->update($object);

        return redirect('posts');

    }

    public function delete(Post $posts)
    {
        $content = json_decode($posts->content, true);
        // dd($content);
        File::delete('./uploads/' . $content['image']);

        Post::destroy($posts->id);
        return redirect()->back();
    }
}
