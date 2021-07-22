<!-- 1- first thing  -->
@extends("layouts.app");

<!-- 2- second thing  -->
<!-- we nee to define what we need to show into section  -->

<!-- 3- define @yield('') in parent -->

<!-- this is first section we need to pass it  -->
@section('pageName')
index
@endsection

@section('content')
<!-- this is second section we need to pass it  -->
<div class="container">
<center>
    <a href="{{route('posts.create')}}" class="btn btn-primary mt-5 w-50">Add New Post</a>
</center>
<table class="table mt-4 bg-dark text-light text-center">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Owner</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>

        @if($allPostsData->count())
            @foreach($allPostsData as $post)
            <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->user ? $post->user->name : 'not found'}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->created_at->toDateString()}}</td>
            <td>
            <!-- in here we need to pass parameter post in uri -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12" >
                <a href="{{route('posts.show' , ['post'=>$post->id])}}" class="btn btn-secondary mx-1">View</a>
                </div>

                <!-- we need to check who is logged  -->
                @if($post->ownedBy(auth()->user()))

                    <div class="col-lg-4 col-md-6 col-12" >
                    <a href="{{route('posts.edit' , ['post'=>$post->id])}}" class="btn btn-warning mx-1">Edit</a>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <form method="post" action="{{route('posts.destroy' , ['post'=>$post->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-1">Delete</button>
                        </form>
                    </div>

                @endif

            </div>
            </td>
            </tr>
            </div>
            <!-- to display pagination arrows -->
            <!-- {{$allPostsData->links()}} -->
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-danger h4">there are no posts yet !!!!</td>
            </tr>
        @endif
    </tbody>

@endsection

