<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\storePostRequest;

class postController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return $post;
    }

    public function store(storePostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->createdBy,
        ]);
        return $post;
    }
}
