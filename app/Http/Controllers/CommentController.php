<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use function GuzzleHttp\Promise\all;

class CommentController extends Controller
{
    public function showCommentForm($id)
    {
        $post = Post::find($id);

        return view('showCommentForm',compact('post'));
    }

    public function saveComment(Request $request,$id)
    {
        $request->validate([
           'body'=>'required'
        ]);
        $post = Post::find($id); //dobili smo post koji komentarisemo
        $new_comment = new Comment();
        $new_comment->content = $request->body;
        $new_comment->post_id = $post->id;
        $new_comment->user_id = Auth::user()->id;
        $new_comment->save();

        return redirect()->back()->with('message','Comment sent');

    }

    public function showAllComments($id)
    {
        $post = Post::find($id);
        //$all_comments = Comment::where('post_id',$post->id)->get();
        $all_comments = $post->comments; //relacija has many

        return view('showComments',compact('all_comments','post'));
    }



}
