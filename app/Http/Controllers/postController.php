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
        // $allPostsData = Post::all();
        $allPostsData = Post::paginate(5);

        // $allPostsData = Post::pagination(4);
        // @dd($allPostsData);
        return view("posts.index" , ['allPostsData'=>$allPostsData]); // == posts/index
    }

    // protected function serializeDate(DateTimeInterface $date)
    //     {
    //         return $date->format('Y-m-d');
    //     }

    // public function show($postId)
    public function show($id)
    {
        // return $postId;// now we print uri
        //to know dynamic uri we write or user write we can pass it into parameter and take it

        $post = Post::find($id);

        return view("posts.show" , ['post'=>$post]);
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
        //     'createdBy'=>['required' , 'exist:users,id'], //check if id exist or not

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

    public function edit($id)
    {
        //this is manual method for update
        // $post = Post::find($id);
        // $post->title = 'test update value';
        // $post->save();
        // @dd($post);

        //second method
        $post = Post::find($id);
        return view('posts.edit' , ['post'=>$post]);
    }


    public function update(storePostRequest $request ,$id){
        $postUpdated = Post::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        // $postUpdated->save();
        return redirect()->route('posts.index');
    }

}
