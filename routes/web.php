<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\labOneController; //== require labOneController
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\StudentController;

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
    // @dd(imagesController::class);
    return view('welcome');

});

// Route::get('/alaa' , [imagesController::class , 'show']);


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
// Route::get('/posts' , [PostController::class , 'index'])->name('posts.index'); // from here we call controller and we use view from controller

// Route ::get('/posts/create' , [PostController::class , 'create'])->name('posts.create');

// Route ::post('/posts' , [PostController::class , 'store'])->name('posts.store');//this is submit button

// Route ::get('/posts/{post}' , [PostController::class , 'show'])->name('posts.show'); // this is to show or view (read from crud operation) ==> {}=>means dynamic uri

// Route ::delete('/posts/{post}' , [PostController::class , 'destroy'])->name('posts.destroy');

// Route ::get('/posts/{post}/edit' , [PostController::class , 'edit'])->name('posts.edit');

// Route::post('/posts/{post}' , [PostController::class , 'update'])->name('posts.update');

Route::group(['middleware'=> 'auth'], function(){

    // Route::get( uri : '/controller' , action : [labonecontroller::class , 'show']);

    //we need to use route name
    Route::get('/posts' , [PostController::class , 'index'])->name('posts.index'); // from here we call controller and we use view from controller

    Route ::get('/posts/create' , [PostController::class , 'create'])->name('posts.create');

    Route ::post('/posts' , [PostController::class , 'store'])->name('posts.store');//this is submit button

    Route ::get('/posts/{post}' , [PostController::class , 'show'])->name('posts.show'); // this is to show or view (read from crud operation) ==> {}=>means dynamic uri

    Route ::delete('/posts/{post}' , [PostController::class , 'destroy'])->name('posts.destroy');

    Route ::get('/posts/{post}/edit' , [PostController::class , 'edit'])->name('posts.edit');

    Route::post('/posts/{post}' , [PostController::class , 'update'])->name('posts.update');
});




// this is for authontication
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// this is for social login into github
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    return "error";
    $user = Socialite::driver('github')->user();
    // @dd($user);
    // $user->token
});


// this is for social login into google
Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();
});


//to store data comes from social media accounts
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // OAuth 2.0 providers...
    $token = $user->token;
    $refreshToken = $user->refreshToken;
    $expiresIn = $user->expiresIn;

    $user = Socialite::driver('github')->userFromToken($token);
    // @dd($user);

    // OAuth 1.0 providers...
    // $token = $user->token;
    // $tokenSecret = $user->tokenSecret;

    // All providers...
    // $user->getId();
    // $user->getNickname();
    // $user->getName();
    // $user->getEmail();
    // $user->getAvatar();
});



// this is for caching
Route::get('/cache', function () {
    return Cache::get('key');
});




// how to use ajax request
Route::get('ajax/request', [StudentController::class, 'ajaxRequest'])->name('ajax.request');

Route::post('ajax/request/store', [StudentController::class, 'ajaxRequestStore'])->name('ajax.request.store');






