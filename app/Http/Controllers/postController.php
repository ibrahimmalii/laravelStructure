<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class postController extends Controller
{
    public function index ()
    {
        $allPostsData = Post::all();
        // @dd($allPostsData);
        return view("posts.index" , ['allPostsData'=>$allPostsData]); // == posts/index
    }

    // public function show($postId)
    public function show()
    {
        // return $postId;// now we print uri
        //to know dynamic uri we write or user write we can pass it into parameter and take it



        return view("posts.show");
    }

    public function create()
    {
        return view ('posts.create');
    }

    public function store()
    {

        // we need to get all data we need to store
        $requestData = request()->all();
        // dd($requestData);

        // equal insert into
        Post::create([
            'createdBy' => $requestData['createdBy'],
            'title' => $requestData['title'],
            'description' => $requestData['description']
        ]);
        //now we add data into database;

        return redirect()->route('posts.index');
    }


    public function destroy()
    {
        Post::table('users')->where('id', 9)->delete();
        return redirect()->route('posts.index');
    }

    public function edit()
    {
        return view('posts.edit');
    }
}
