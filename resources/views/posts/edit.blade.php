@extends('layouts.app')

@section('title')Edit @endsection

@section('content')
<form method="POST" action="{{ route('posts.update', ['post' => $post['id']] ) }}">
            @csrf
            @method('put')
            <div class="mb-3 mt-5">
                <label for="exampleFormControlInput1" class="form-label" >Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="Title" value={{ $post->title }}>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" >Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="Description" rows="3">{{ $post->description }}
                </textarea>
            </div>
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label" name="Title">Post Creator</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value={{$post->user->name}} readonly>
            </div>

          <button class="btn btn-success mt-3">Update</button>
        </form>
@endsection