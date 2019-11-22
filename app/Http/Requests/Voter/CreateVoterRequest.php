<?php

namespace App\Http\Requests\Voter;


use Illuminate\Foundation\Http\FormRequest;

class CreateVoterRequest extends FormRequest
{

	public function rules()
	{
        return [
            'name' => 'required|string|max:50',
            'date' => 'required|date',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
