<?php

namespace App\Http\Requests\Client;


use Illuminate\Foundation\Http\FormRequest;

class CreateMatchRequest extends FormRequest
{

	public function rules()
	{
        return [
            'name' => 'required|string|max:50',
            'date' => 'required|datetime',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
