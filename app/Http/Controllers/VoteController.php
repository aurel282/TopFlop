<?php

namespace App\Http\Controllers;



use App\Http\Requests\Vote\CreateVoteRequest;
use App\Service\CandidateService;
use App\Service\MatchService;
use App\Service\VoterService;
use App\Service\VoteService;

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
        VoteService $voteService
    )
    {
        $voteService->createVote($request->all());

        return view(
            'welcome'
        );
    }
}
