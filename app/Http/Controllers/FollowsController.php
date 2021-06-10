<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        //auth()->user() is logged in user
        //$user->profile is $user's(from profile/{user}) profile
        return auth()->user()->following()->toggle($user->profile);
    }
}
