<?php

namespace App\Http\Controllers;



use App\Service\CandidateService;
use App\Service\MatchService;
use App\Service\VoterService;

class VoteController extends Controller
{


    public function getCreate(
        MatchService $matchService,
        CandidateService $candidateService,
        VoterService $voterService
    )
    {
        $matches = $matchService->getAllMatches();
        $candidates = $candidateService->getAllCandidates();
        $voters = $voterService->getAllVoters();

        return view(
            'vote.create',
            [
                'matches' => $matches,
                'voters' => $voters,
                'candidates' => $candidates,
            ]
        );
    }

    public function postCreate(
        CreateVoteRequest $request,
        VoteServic $voteService
    )
    {
        $voteService->createVote($request->all());

        return view(
            'welcome'
        );
    }
}
