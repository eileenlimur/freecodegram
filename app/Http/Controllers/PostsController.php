<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            //'another' => '',  --- would include this if field has no validation rules
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->posts()->create([
                'caption' => $data['caption'],
                'image' => $imagePath,
            ]
        );

        // dd(request()->all());

        return redirect('/profile/' . auth()->user()->id);
    }
}
