<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\storePostRequest;
use Illuminate\Support\Facades\Cache;


class PostController extends Controller
{
    public function index ()
    {
        // $allPostsData = Post::all();

        //to reduce query request in debugger we need to use (with(['any thing we call in DB query']))
        // $allPostsData = Post::orderBy('created_at' , 'desc')->with(['user'])->paginate(5);
        $allPostsData = Post::latest()->with(['user'])->paginate(5);
        // $allPostedDeleted = Post::all();
        // $restoredData = $allPostedDeleted->restore();

        // $allPostsData = Post::pagination(4);
        // @dd($allPostsData);
        return view("posts.index" , ['allPostsData'=>$allPostsData ]); // == posts/index
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
        // $users = User::all();

        // return view ('posts.create' , ['user'=>$users]);
        return view ('posts.create');
    }

    // public function store(request $requestObj)
    public function store(storePostRequest $requestObj)
    {
        // @dd($requestObj->image);
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
            // 'title.required'=>'you need to write something here',
            // 'title.min'=>'you need to write more than three char'
        // ]);


        $image = time().'.'.$requestObj->image->extension();
        $requestObj->image->move(public_path('uploads'), $image);

        // @dd(public_path('uploads'));

        // equal insert into
        Post::create([
            // 'createdBy' => $requestData['createdBy'],
            // 'title' => $requestData['title'],
            // 'description' => $requestData['description'],
            // 'user_id' => $requestData['createdBy'],

            'title' => $requestObj->title,
            'description' => $requestObj->description,
            'user_id' => $requestObj->createdBy,
            'image' => public_path('uploads')."/".$image,
        ]);
        //now we add data into database;

        return redirect()->route('posts.index');

    }//end of store method


    // public function destroy($id)
    public function destroy(Post $post)
    {
        // Post::where('id', $id)->delete();
        // $post = Post::find($id);

        $this->authorize('change' , $post);
        $post->delete();
        // return redirect()->route('posts.index'); //or we can use ==> back();
        return back();
    }

    // public function edit($id)
    public function edit(Post $post)
    {
        //this is manual method for update
        // $post = Post::find($id);
        // $post->title = 'test update value';
        // $post->save();
        // @dd($post);

        //second method
        // $post = Post::find($id); // if we get with id but we can get it directly from constructor
        // @dd($post);
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



    // for test chaching
    public function testBasicExample()
    {
        Cache::shouldReceive('get')
            ->with('key')
            ->andReturn('value');

        $response = $this->get('/cache');

        $response->assertSee('value');
        @dd($response);
    }


}
