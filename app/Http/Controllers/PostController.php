<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
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
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store()
    {
        $post = request()->all();
        Post::create([
            'title' => $post['title'],
            'description' => $post['description'],
            'user_id' => $post['post_creator']
        ]);
        return redirect()->route('posts.index');       
       
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
        return redirect()->route('posts.index');              
    }
}
