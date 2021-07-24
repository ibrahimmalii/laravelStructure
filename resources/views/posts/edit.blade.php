@extends('layouts.app');

@section('pageName')
create
@endsection

@section('content')

<form class="mt-5" action="{{route('posts.update' , ['post'=>$post->id])}}" method="post">
<!-- we need to write it after any post form  -->
@csrf
@method('PUT')

<p class="h3 text-center text-warning">Edit Your Post From Here</p>
  <div  class="form-group">
    <label for="titlePost" class="h4 text-danger">Title</label>
    <input type="text" name="title" value="{{$post->title}}" placeholder="insert title of post" class="form-control">
    @error('title')
      <span class="text-danger">{{$message}}</span>
    @enderror
  </div>


  <label for="titlePost" class="h4 mt-3 text-danger">Description</label>
  <textarea class="form-control" value="" name="description" placeholder="write what you want" style=" resize:none;">{{$post->description}}</textarea>
  @error('description')
    <div>
      <span class="text-danger">{{$message}}</span>
    </div>
  @enderror
  <select class="form-control mt-3" name="createdBy">
      <option value="{{$post->user_id}}">{{$post->user->name}}</option>
  </select>

  <button type="submit" href=""  class="btn btn-danger mt-3">Save Your Update</button>
  <a href="{{route('posts.index')}}" class="btn btn-primary mt-3">Back To Menu</a>
</form>

@endsection
