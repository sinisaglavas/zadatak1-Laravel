<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $all_posts = Post::all();

        return view('welcome',compact('all_posts'));
    }

    public function showSinglePost($id)
    {
        $single_post = Post::find($id);

        return view('singlePost',compact('single_post'));
    }


}
