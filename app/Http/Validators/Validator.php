<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class Validator extends Validator
{
    public function val($job, $body)
    {
        return [
            $job => 'required|max:50',
            $body => 'required|max:500'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'job' => 'required|max:50',
            'body' => 'required|max:500'
        ];
    }
}
