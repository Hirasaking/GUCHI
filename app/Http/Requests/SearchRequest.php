<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'key_word1' => 'required',
            // 'keyword3' => 'required',
            // 'body' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return[
            'key_word1.required' => '検索ワード1は入力必須です',
        ];
    }


    }
