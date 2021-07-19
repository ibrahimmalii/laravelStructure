<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\storePostRequest;

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
        $users = User::all();

        return view ('posts.create' , ['users'=>$users]);
    }

    // public function store(request $requestObj)
    public function store(storePostRequest $requestObj)
    {

        // we need to get all data we need to store
        // $requestData = request()->all();
        // dd($requestData); //== dd($requestObj)

        //========it's instance from request==========//
        // dd($requestObj);

        //=============Validation========
        // $requestObj->validate([ //==> we can put this validate into extract class and use it more
        //     // 'title'=>'required|min:5|max:20'
        //     'title'=>['required' , 'min:5' , 'max:20'],
        //     'description'=>['required' , 'min:5' , 'max:20'],
        //     'createdBy'=>['required'],

        // ],[
        //     //to override error messages
        //     'title.required'=>'you need to write something here',
        //     'title.min'=>'you need to write more than three char'
        // ]);


        // equal insert into
        Post::create([
            // 'createdBy' => $requestData['createdBy'],
            // 'title' => $requestData['title'],
            // 'description' => $requestData['description'],
            // 'user_id' => $requestData['createdBy'],




            'title' => $requestObj->title,
            'description' => $requestObj->description,
            'user_id' => $requestObj->createdBy,
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
