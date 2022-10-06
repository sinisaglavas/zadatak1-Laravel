<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() // odgovorna za home page
    {
        //$all_posts = Post::where('user_id',Auth::user()->id)->get(); // prikazi postove samo od ulogovanog usera
        $all_posts = Auth::user()->posts; // has many relacija - metoda je u User modelu
        return view('home',compact('all_posts'));
    }


    public function showPostForm()//prikazuje formu posle klika (New post) na /home page
    {
        return view('home.showPostForm');
    }


    public function savePost(Request $request) // validira i smesta u bazu tj. tabelu posts
    {
        $request->validate([
           'title'=>'required | max:50',
           'body'=>'required'
        ]);

        Post::create([  // punjenje baze tj. tabele Posts
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('home'));
    }


    public function showAllUsers()
    {
        $all_users = User::all();

        return view('home.showAllUsers',compact('all_users'));
    }

    public function showSingleUser($id)
    {
        $single_user = User::find($id);
        $single_user_post = $single_user->posts; //relacija has many

        return view('home.showSingleUser',compact('single_user','single_user_post'));
    }

    public function showSinglePost($id)
    {
        $single_post = Post::find($id);
        //$author = User::where($single_post->user_id,'id')->get();

        return view('home.singlePost',compact('single_post'));
    }




}

