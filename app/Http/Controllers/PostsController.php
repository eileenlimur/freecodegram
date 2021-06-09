<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
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

        auth()->user()->posts()->create($data);

        dd(request()->all());
    }
}
