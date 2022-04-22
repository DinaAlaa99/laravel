<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class CommentController extends Controller
{
    public function store($postId){
       $commentData= request()->all(); 
       $post=Post::find($postId);
       $post->comments()->create([
             'body' => $commentData['body'],
             'commentable_id' =>$postId,
             'commentable_type' => 'App\Post',
             'user_id'=>$commentData['comment_creator']
         ]);
        return redirect()->route('posts.show',['post' => $postId]); 
    }
    public function edit($postId)
    {
        $post = Post::find($postId);
        $comment=$post->comments()->first();
        return view('comments.edit',[
            'post' => $post,
            'comment' => $comment

        ]);
       
    }
    public function update($postId){
        $commentData = request()->all();
        $post=Post::find($postId);
        $post->comments()->update([
            'body' => $commentData['body']
        ]);
        return redirect()->route('posts.show',['post' => $postId]);
      
    }
    public function destroy($postId,$commentId)
    {
        $post = Post::find($postId);
        $post->comments()->find($commentId)->delete();
        return redirect()->route('posts.show',['post' => $postId]);
    }
}
