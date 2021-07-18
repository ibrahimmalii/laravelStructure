@extends('layouts.app');
@section('pageName') details @endsection

@section('content')

<!-- to show all details  -->
<div class="card mt-5 bg-dark text-light">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">description of post</p>
    <p class="small">created at</p>
  </div>
    <a href="{{route('posts.index')}}" class="btn btn-primary">Back To Menu</a>
</div>

@endsection
