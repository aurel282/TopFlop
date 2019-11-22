<?php

namespace App\Http\Controllers;


use App\Http\Requests\Candidate\CreateCandidateRequest;
use App\Service\CandidateService;

class CandidateController extends Controller
{


    public function getCreate()
    {
        return view(
            'candidate.create'
        );
    }

    public function postCreate(
        CreateCandidateRequest $request,
        CandidateService $candidateService
    )
    {
        $candidateService->createCandidate($request->all());

        return view(
            'welcome'
        );
    }
}
