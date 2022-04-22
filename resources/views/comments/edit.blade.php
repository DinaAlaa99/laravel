@extends('layouts.app')

@section('title')Edit Comment @endsection

@section('content')
<form method="POST" action="{{ route('comments.update' ,['post' => $post['id'], 'comment' => $comment['id']]) }}">
            @csrf
            @method('put')
            <div class="mb-3 mt-5">
                <label for="exampleFormControlInput1" class="form-label" >Comment</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="body" value={{ $comment->body}}>
            </div>
            <div class="mb-3 mt-5">
                <label for="exampleFormControlInput1" class="form-label" >Commentted By</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="comment_creator" value={{ $comment->user->name }} readonly>
            </div>
          <button class="btn btn-success mt-3">Update</button>
        </form>
@endsection