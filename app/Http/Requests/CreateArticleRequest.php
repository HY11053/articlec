<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title'=>'required|max:100|min:5',
            'webname'=>'required',
            'keywords'=>'required',
            'brandcid'=>'required',
            'brandtypeid'=>'required',
            'brandid'=>'required',
            'body'=>'required',
            'typeid'=>'required',
            'ismake'=>'required|numeric',
            //'ismake'=>'required|numeric',
            //'mid'=>'numeric',


        ];
    }
}
