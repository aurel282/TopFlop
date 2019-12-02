<?php

namespace App\Http\Requests\Result;


use Illuminate\Foundation\Http\FormRequest;

class ResultSelectMatchRequest extends FormRequest
{

	public function rules()
	{
        return [
            'match' => 'required|int',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
