<?php

namespace App\Http\Controllers;



use App\Http\Requests\Vote\CreateVoteRequest;
use App\Models\Database\Match;
use App\Service\CandidateService;
use App\Service\MatchService;
use App\Service\VoterService;
use App\Service\VoteService;

class ResultController extends Controller
{


    public function getMatchOfResult(
        MatchService $matchService
    )
    {
        $matches = $matchService->getAllMatches();

        return view(
            'result.select_match',
            [
                'matches' => $matches,
            ]
        );
    }

    public function postMatchOfResult(
        MatchService $matchService
    )
    {
        $matches = $matchService->getAllMatches();

        return view(
            'result.select_match',
            [
                'matches' => $matches,
            ]
        );
    }

    public function getReadVote(
        Match $match,
        VoteService $voteService
    )
    {
        $votes = $voteService->getUnreadVotesByMatch($match);


        if(count($votes) > 0)
        {
            return view(
                'result.display_vote'
            );
        }
        else
        {
            return view(
                'result.display_final_count'
            );
        }
    }

    public function postReadVote(
        Match $match,
        VoteService $voteService
    )
    {
        $votes = $voteService->getUnreadVotesByMatch($match);


        if(count($votes) > 0)
        {
            return view(
                'result.display_vote'
            );
        }
        else
        {
            return view(
                'result.display_final_count'
            );
        }
    }
}
