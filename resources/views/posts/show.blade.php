@extends('layouts.app');
@section('pageName') details @endsection

@section('content')

<!-- to show all details  -->
<div class="card mt-5 bg-dark text-light">
  <div class="card-body">
    <p class="h5 text-warning">created by : <span class="small text-info">{{$post->user->name}} at : {{$post->created_at}}</span></p>
    <h5 class="card-title text-warning">Post title : <span class="small text-info">{{$post->title}}</span></h5>
    <p class="h5 card-text text-warning">description of post : <span class="small text-info">{{$post->description}}</span></p>
    <img src="$post->image" alt="img">
  </div>
    <a href="{{route('posts.index')}}" class="btn btn-danger">Back To Menu</a>
</div>

@endsection
