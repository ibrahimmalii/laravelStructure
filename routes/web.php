<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\labOneController; //== require labOneController
use App\Http\Controllers\postController;
use App\Http\Controllers\testController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $ibrhim = 'ali';
    // dd($ibrhim); // stop execution and show details for this thing
    return view('welcome');

});


// Route::get(uri : '/lab-one', action : function () {
//     $mom = "rehab";
//     return view('labOne' , ['mom' => '$mom']);
// }); // we will do same thing by controller below


// labonecontroller::class == controller path
// we need to use controller
// we need to define show function into controller we use

//this is first test in laravel
// Route::get( uri : '/controller' , action : [labonecontroller::class , 'show']);


// //we need to use route name
// Route::get('/posts' , [postController::class , 'index'])->name('posts.index'); // from here we call controller and we use view from controller

// Route ::get('/posts/create' , [postController::class , 'create'])->name('posts.create');

// Route ::post('/posts' , [postController::class , 'store'])->name('posts.store');//this is submit button

// Route ::get('/posts/{post}' , [postController::class , 'show'])->name('posts.show'); // this is to show or view (read from crud operation) ==> {}=>means dynamic uri

// Route ::delete('/posts/{post}' , [postController::class , 'destroy'])->name('posts.destroy');

// Route ::get('/posts/{post}/edit' , [postController::class , 'edit'])->name('posts.edit');

// Route::post('/posts/{post}' , [postController::class , 'update'])->name('posts.update');

Route::group(['middleware'=> 'auth'], function(){

    Route::get( uri : '/controller' , action : [labonecontroller::class , 'show']);

    //we need to use route name
    Route::get('/posts' , [postController::class , 'index'])->name('posts.index'); // from here we call controller and we use view from controller

    Route ::get('/posts/create' , [postController::class , 'create'])->name('posts.create');

    Route ::post('/posts' , [postController::class , 'store'])->name('posts.store');//this is submit button

    Route ::get('/posts/{post}' , [postController::class , 'show'])->name('posts.show'); // this is to show or view (read from crud operation) ==> {}=>means dynamic uri

    Route ::delete('/posts/{post}' , [postController::class , 'destroy'])->name('posts.destroy');

    Route ::get('/posts/{post}/edit' , [postController::class , 'edit'])->name('posts.edit');

    Route::post('/posts/{post}' , [postController::class , 'update'])->name('posts.update');
});




// this is for authontication
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



