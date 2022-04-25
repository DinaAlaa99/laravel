@extends('layouts.app')

@section('title')
    {{ $post['title'] }}
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-header">
            Post info
        </div>
        <div class="card-body">
            <div>
                <span style="font-size: 1.2rem; font-weight: bold">Title: </span>
                {{ $post['title'] }}
            </div>
            <div>
                <span style="font-size: 1.2rem; font-weight: bold">Description: </span>
                {{ $post['description'] }}
            </div>
        </div>
    </div>


    <div class="card mt-5">
        <div class="card-header">
            Post Creator info
        </div>
        <div class="card-body">
            <div>
                <span style="font-size: 1.2rem; font-weight: bold">Name: </span>
                {{ $post->user ? $post->user->name : 'Not Found' }}
            </div>
            <div>
                <span style="font-size: 1.2rem; font-weight: bold">Email: </span>
                {{ $post->user ? $post->user->email : 'Not Found' }}
            </div>
            <div>
                <span style="font-size: 1.2rem; font-weight: bold">Created at: </span>
                {{ $created_at }}
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            All Comments
        </div>
        <div class="card-body">
            @foreach ($comments as $comment)
                <div class="mb-5">
                    <span style="font-size: 1.2rem; font-weight: bold">{{ $comment->user->name }} </span>
                    [{{ $comment['created_at'] }}]
                    <div> {{ $comment['body'] }} </div>
                    <div class="mt-2">
                        <a href="{{ route('comments.edit', ['post' => $post['id'], 'comment' => $comment['id']]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('comments.destroy', ['post' => $post['id'], 'comment' => $comment['id']]) }}"
                            onclick="return confirm('Are you sure?')" method="POST" style="display:inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="comment mt-5 mb-5">
        <form method="POST" action="{{ route('comments.store', ['post' => $post['id']]) }}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add Comment</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name='body' id="exampleFormControlTextarea1" rows="2"></textarea>
            </div>
            @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comment Creator</label>
                <select class="form-control" name='comment_creator'>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success">Comment</button>
        </form>
    </div>
@endsection
