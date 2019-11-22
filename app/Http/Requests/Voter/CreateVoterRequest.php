<?php

namespace App\Http\Requests\Voter;


use Illuminate\Foundation\Http\FormRequest;

class CreateVoterRequest extends FormRequest
{

	public function rules()
	{
        return [
            'name' => 'required|string|max:50',
            'firstname' => 'nullable|string|max:50',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
