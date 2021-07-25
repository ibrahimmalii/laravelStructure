@extends('layouts.app');

@section('pageName')
create
@endsection

@section('content')

<!-- to show message errors or we can use $message like below  -->
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<div class="text-center">
    <p class="h1 text-danger">Make An Attractive Post</p>
</div>

<!-- Create Post Form -->

<form class="mt-5" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
<!-- we need to write it after any post form  -->
@csrf

  <div  class="form-group">
    <label for="titlePost" " class="h4 text-primary">Title</label>
    <input type="text" name="title" value="{{old('title')}}" placeholder="insert title of post" class="form-control">
    @error('title')
        <div class="text-danger mb-3">
            <span>{{$message}}</span>
        </div>
    @enderror
  </div>
  <label for="description" class="h4 text-primary">Description</label>
  <textarea class="form-control" name="description"  placeholder="write what you want" style=" resize:none;">{{old('description')}}</textarea>
  @error('title')
        <div class="text-danger mb-3">
            <span>{{$message}}</span>
        </div>
  @enderror

    <input type="file" name="image" class="bg-dark text-warning">
    @error('image')
        <div class="text-danger mb-3">
            <span>{{$message}}</span>
        </div>
    @enderror

    <select class="form-control mt-3" name="createdBy">

        <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>

    </select>
  <button type="submit" class="btn btn-primary mt-3">Add Your Post</button>
</form>

@endsection
