<?php

namespace App\Http\Controllers;



use App\Http\Requests\Result\ResultSelectMatchRequest;
use App\Models\Database\Match;
use App\Service\MatchService;
use App\Service\ScoreService;
use App\Service\VoteService;
use Illuminate\Http\Request;

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
        $matchService->closeVote($resultSelectMatchRequest['match']);

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
            $vote = $votes->random();
            session()->flash('vote_id', $vote->id);

            return view(
                'result.result_vote',
                [
                    'match' => $match,
                    'vote' => $vote
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
        VoteService $voteService,
        ScoreService $scoreService,
        Request $request
    )
    {
        $vote = $request->session()->get('vote_id');
        $vote = $voteService->getVoteById($vote);
        $voteService->setRead($vote);

        $votes = $voteService->getUnreadVotesByMatch($match);

        if(count($votes) > 0)
        {
            $scoreService->updateSimpleScore($vote);
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
            $scoreService->updateLastScore($vote);

            $tops = $scoreService->getAllTopForMatch($match);
            $flops = $scoreService->getAllFlopForMatch($match);
            $ghosts = $scoreService->getAllGhostsForMatch($match);
            return view(
                'result.result_final',
                [
                    'match' => $match,
                    'tops' => $tops,
                    'flops' => $flops,
                    'ghosts' => $ghosts
                ]
            );
        }
    }
}
