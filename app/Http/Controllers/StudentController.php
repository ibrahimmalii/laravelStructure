<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller

{

    /**

     * Display a listing of the myformPost.

     *

     * @return \Illuminate\Http\Response

     */

    public function ajaxRequest()

    {

        return view('ajaxExample');

    }



    /**

     * Display a listing of the myformPost.

     *

     * @return \Illuminate\Http\Response

     */

    public function ajaxRequestStore(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'password' => 'required',

            'email' => 'required|email',

            'address' => 'required',

        ]);


        if ($validator->passes()) {
            // Store Data in DATABASE from HERE
            return response()->json(['success'=>'Added new records.']);
        }

        return response()->json(['error'=>$validator->errors()]);

    }

}
