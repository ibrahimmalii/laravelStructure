@extends('layouts.app');

@section('pageName')
create
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->

<form class="mt-5" action="{{route('posts.index')}}" method="post">
<!-- we need to write it after any post form  -->
@csrf

  <div  class="form-group">
    <label for="titlePost" " class="h4 text-primary">Title</label>
    <input type="text" name="title" placeholder="insert title of post" class="form-control">
  </div>
  <label for="titlePost" " class="h4 text-primary">Description</label>
  <textarea class="form-control mb-3" name="description" placeholder="write what you want" style=" resize:none;"></textarea>

    <select class="form-control" name="createdBy">

      @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach

    </select>
  <button type="submit" class="btn btn-primary mt-3">Add Your Post</button>
</form>

@endsection
