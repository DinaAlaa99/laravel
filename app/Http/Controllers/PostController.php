<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Carbon\Carbon;
class PostController extends Controller
{   
    
    public function index()
    {

        $posts=Post::paginate(6);
        return view('posts.index',compact('posts'));
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
            'user_id' => $post['post_creator'],
        ]);
        return redirect()->route('posts.index');       
       
    }

    public function show($postId)
    {
       
        $post = Post::find($postId);
        return view('posts.show',[
            'post' => $post,
            'created_at'=>Carbon::parse($post['created_at'])->format('l jS \of F Y h:i:s A')
        ]);
       
    }
    public function edit($postId)
    {
       
        $post = Post::find($postId);
        $user = User::find($post->user_id);
        return view('posts.edit',[
            'post' => $post,
        ]);
       
    }
    public function update($postId){
        $post = request()->all();
    
        Post::where('id',$postId)->update([
            'title' => $post['Title'],
            'description' =>  $post ['Description'],            
        ]);
        return redirect()->route('posts.index');
      
    }
    public function destroy($postId)
    {
       
        $post = Post::find($postId);
        $post->delete();
        return redirect()->route('posts.index');              
    }
}
