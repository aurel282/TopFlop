<?php

namespace App\Http\Controllers;



use App\Http\Requests\Result\ResultSelectMatchRequest;
use App\Models\Database\Match;
use App\Service\MatchService;
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
        ResultSelectMatchRequest $resultSelectMatchRequest,
        VoteService $voteService,
        MatchService $matchService
    )
    {
        $match = $matchService->getMatchById($resultSelectMatchRequest->get('match'));

        return redirect()->route(
            'result.show',
            [
                'match' => $match
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
                'result.result_vote',
                [
                    'match' => $match,
                    'vote' => $votes->random()
                ]
            );
        }
        else
        {
            return view(
                'result.result_final'
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
                'result.result_vote',
                [
                    'match' => $match,
                    'vote' => $votes->random()
                ]
            );
        }
        else
        {
            return view(
                'result.result_final'
            );
        }
    }
}
