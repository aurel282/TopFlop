<?php

namespace App\Http\Requests\Vote;


use Illuminate\Foundation\Http\FormRequest;

class CreateVoteRequest extends FormRequest
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
