@extends('layouts.app')

@section('title'){{$posts['title']}} @endsection

@section('content')

<div class="card mt-5">
<div class="card-header">
            Post info
        </div>
  <div class="card-body">
  <div>
        <span style="font-size: 1.2rem; font-weight: bold">Title: </span>
                {{$posts['title']}}
            </div>
            <div>
          <span style="font-size: 1rem; font-weight: bold">Description: </span>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores dolor illo eum deserunt corrupti sequi ipsam! 
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
                {{$posts['post_creator']}}
            </div>
            <div>
          <span style="font-size: 1rem; font-weight: bold">Created at: </span>
                {{$posts['created_at']}}
            </div>
  </div>
</div>




@endsection