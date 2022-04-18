<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{   
    
    public function index()
    {
       
        $posts = Post::all();
        return view('posts.index',[
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return view('posts.store');
    }

    public function show($postId)
    {
       
        $post = Post::find($postId);
        return view('posts.show',[
            'posts' => $post,
        ]);
       
    }
    public function edit($postId)
    {
       
        $posts = Post::all();
        return view('posts.edit',[
            'posts' => $posts[$postId-1],
        ]);
       
    }
    public function update(){
        return view('posts.update');
    }
    public function destroy($postId)
    {
       
        $post = Post::find($postId);
        $post->delete();
        return redirect('/posts')->with('success','post deleted successfully..');
       
    }
}
