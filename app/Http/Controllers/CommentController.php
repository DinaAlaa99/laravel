<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Requests\StoreCommentRequest;
class CommentController extends Controller
{
    public function store($postId,StoreCommentRequest $request){
       $commentData= request()->all(); 
       $post=Post::find($postId);
       $post->comments()->create([
             'body' => $commentData['body'],
             'user_id'=>$commentData['comment_creator']
         ]);
        
        return redirect()->route('posts.show',['post' => $postId]); 
    }
    public function edit($postId,$commentId)
    {
        $post = Post::find($postId);
        $comment=$post->comments()->find($commentId);
        return view('comments.edit',[
            'post' => $post,
            'comment' => $comment

        ]);  
    }
    public function update($postId,$commentId){
        $commentData = request()->all();
        $post=Post::find($postId);
        $post->comments()->find($commentId)->update([
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
