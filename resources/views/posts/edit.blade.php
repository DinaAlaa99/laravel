@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
    <form method="POST" action="{{ route('posts.update', ['post' => $post['id']]) }}">
        @csrf
        @method('put')
        <div class="mb-3 mt-5">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control @error('Title') is-invalid @enderror" id="exampleFormControlInput1"
                name="Title" value={{ $post->title }}>
        </div>
        @error('Title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control @error('Description') is-invalid @enderror" id="exampleFormControlTextarea1"
                name="Description" rows="3">{{ $post->description }}
            </textarea>
        </div>
        @error('Description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select class="form-control" name='post_creator'>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success mt-3">Update</button>
    </form>
@endsection
