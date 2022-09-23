<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data['users'] = $users;

        // dd($users->toArray());

        return view('user.index', $data);

    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $object = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60)
        ];

        // dd($object);

        User::create($object);

        return redirect()->route('users.index')->with('status', 'Data User berhasil ditambahkan!');
    }

    public function show($id)
    {

    }

    public function edit(User $users)
    {
        $data['users'] = $users;

        return view('user.edit', $data);
    }

    public function update(Request $request, User $users)
    {
        $current = User::findOrFail($users->id);
    }

    public function delete(User $users)
    {
        User::destroy($users->id);
        return redirect()->back();
    }
}
