@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mt-5 mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name='title' class="form-control @error('title') is-invalid @enderror"
                id="exampleFormControlInput1" placeholder="">

        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name='description'
                id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        @error('description')
        <div class="alert alert-danger ">{{ $message }}</div>
        @enderror



        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select class="form-control @error('post_creator') is-invalid @enderror" name='post_creator'>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        @error('post_creator')
        <div class="alert alert-danger ">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="">Upload Image</label>
            <input type="file" id="avatar" name="avatar" class="@error('avatar') is-invalid @enderror form-control">
            @error('avatar')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
            </div>
            @enderror
        </div>

        <button class="btn btn-success">Create</button>
    </form>
@endsection
