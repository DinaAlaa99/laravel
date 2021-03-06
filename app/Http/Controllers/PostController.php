<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{   
    
    public function index()
    {

        $posts=Post::paginate(10);
        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)
    {  
        $post = request()->all();
        $path = Storage::putFile('avatars', $request->file('avatar'));
        Post::create([
            'title' => $post['title'],
            'description' => $post['description'],
            'user_id' => $post['post_creator'],
            'path' => $path,
        ]);
        return redirect()->route('posts.index');            
    }

    public function show($postId)
    {
        $users = User::all();
        $post = Post::find($postId);
        $comments=$post->comments;
        return view('posts.show',[
            'post' => $post,
            'users' => $users,
            'comments'=>$comments,
            'created_at'=>Carbon::parse($post['created_at'])->format('l jS \of F Y h:i:s A')
            
        ]);
       
    }
    public function edit($postId)
    {
       
        $post = Post::find($postId);
        $users = User::all();
        return view('posts.edit',[
            'post' => $post,
            'users' => $users

        ]);
       
    }
    public function update($postId,UpdatePostRequest $request){
       
        $post = request()->all();
        
        Storage::delete(Post::find($postId)->path);
        $path = Storage::putFile('avatars', $request->file('avatar'));
        
        Post::where('id',$postId)->update([
            'title' => $post['Title'],
            'description' =>  $post ['Description'],   
            'user_id' => $post['post_creator'],
            'path' => $path,       
        ]);
        return redirect()->route('posts.index');
      
    }
    public function destroy($postId)
    {
        Storage::delete(Post::find($postId)->path);
        $post = Post::find($postId);
        $post->delete();
        return redirect()->route('posts.index');              
    }
}
