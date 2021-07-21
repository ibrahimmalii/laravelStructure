<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imagesController extends Controller
{
    public function show()
    {
        $love = ['love' => 'love lolo' , 'like' => 'ibrahim'];
        // @dd($love);
        return view('lolo' , ['love' => $love , 'post' => 'ibrahim']);
    }

}
