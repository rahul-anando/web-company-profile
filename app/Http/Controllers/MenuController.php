<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $data['menus'] = $menus;

        return view('menu.index', $data);
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'link' => 'required',
            'is_outbound' => 'required',
            'parent' => 'required',
            'index' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $object = [
            'name' => $request->name,
            'link' => $request->link,
            'is_outbound' => $request->is_outbound,
            'parent' => $request->parent,
            'index' => $request->index,
        ];

        // dd($object);

        Menu::create($object);

        return redirect()->route('menus.index')->with('status', 'Data Menu berhasil ditambahkan!');
    }

    public function show($id)
    {

    }

    public function edit(Menu $menus)
    {
        $data['menus'] = $menus;

        return view('menu.edit', $data);
    }

    public function update(Request $request, Menu $menus)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'link' => 'required',
            'is_outbound' => 'required',
            'parent' => 'required',
            'index' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $current = Menu::findOrFail($menus->id);

        $object = [
            'name' => $request->name,
            'link' => $request->link,
            'is_outbound' => $request->is_outbound,
            'parent' => $request->parent,
            'index' => $request->index,
        ];

        $current->update($object);

        return redirect('menus')->with('status', 'Data Menu berhasil diupdate!');

    }

    public function delete(Menu $menus)
    {
        Menu::destroy($menus->id);
        return redirect()->back();
    }
}
