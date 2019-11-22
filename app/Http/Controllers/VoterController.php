<?php

namespace App\Http\Controllers;


use App\Http\Requests\Voter\CreateVoterRequest;
use App\Service\VoterService;

class VoterController extends Controller
{


    public function getCreate()
    {
        return view(
            'voter.create'
        );
    }

    public function postCreate(
        CreateVoterRequest $request,
        VoterService $voterService
    )
    {
        $voterService->createVoter($request->all());

        return view(
            'welcome'
        );
    }
}
