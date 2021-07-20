<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\storePostRequest;
use App\Http\Resources\PostResource;

class postController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return $posts;
        return PostResource::collection($posts); //==> without new
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        // return $post;

        //if we want to hide and show data to user
        // $postArr = [
        //     'title'=>$post->title,
        //     'description'=>$post->description,
        // ];

        //or we can make:resource to reuse it more
        return new PostResource($post);
    }

    public function store(storePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->createdBy,
        ]);
        return new PostResource($post);
    }
}
