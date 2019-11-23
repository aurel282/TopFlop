<?php

namespace App\Http\Requests\Vote;


use Illuminate\Foundation\Http\FormRequest;

class CreateVoteRequest extends FormRequest
{

	public function rules()
	{
        return [
            'voter' => 'required|int',
            'match' => 'required|int',
            'top_candidate' => 'required|int',
            'flop_candidate' => 'required|int',
            'top_text' => 'required|string',
            'flop_text' => 'required|string',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
