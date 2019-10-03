<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //使わないならTrue
        //https://qiita.com/sakuraya/items/abca057a424fa9b5a187
        return true;
    }

    public function rules()
    {
        return [
            'job' => 'required|max:10',
            'body' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return[
            'job.required' => '職業は入力必須です', 
            'body.required' => '内容は入力必須です',
        ];
    }


    }
