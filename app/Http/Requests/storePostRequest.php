<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class storePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()//put rule validation here
    {
        return [
            'title'=>['required' , 'min:5' , 'max:20'],
            'description'=>['required' , 'min:20' , 'max:100'],
            'createdBy'=>['required'],
            'image'=>['required' , 'image','mimes:jpeg,png,jpg,gif,svg','max:20499999998'],
        ];
    }





    public function messages()
    {
        return [
                //to override error messages
                'title.required'=>'you need to write something here',
                'title.min'=>'you need to write more than thi char',
                'description.min'=>'you need to write more description',
                'image.required'=>'please insert your image first',
                // 'image.Rule'=>'you have to insert only image'
            ];
    }


}
