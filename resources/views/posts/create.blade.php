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

<!-- Create Post Form -->

<form class="mt-5" action="{{route('posts.index')}}" method="post">
<!-- we need to write it after any post form  -->
@csrf

  <div  class="form-group">
    <label for="titlePost" " class="h4 text-primary">Title</label>
    <input type="text" name="title" placeholder="insert title of post" class="form-control">
    @error('title')
        <div class="text-danger">
            <span>{{$message}}</span>
        </div>
    @enderror
  </div>
  <label for="description" class="h4 text-primary">Description</label>
  <textarea class="form-control" name="description" placeholder="write what you want" style=" resize:none;"></textarea>
  @error('title')
        <div class="text-danger">
            <span>{{$message}}</span>
        </div>
    @enderror
    <select class="form-control mt-3" name="createdBy">

      @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach

    </select>
  <button type="submit" class="btn btn-primary mt-3">Add Your Post</button>
</form>

@endsection
