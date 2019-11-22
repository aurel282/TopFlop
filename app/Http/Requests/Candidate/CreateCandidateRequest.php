<?php

namespace App\Http\Requests\Candidate;


use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateRequest extends FormRequest
{

	public function rules()
	{
        return [
            'name' => 'required|string|max:50',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
