<?php

namespace App\Repository;


use App\Models\Database\Match;
use App\Models\Database\Vote;
use App\Models\Database\Voter;
use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Boolean;

class VoteRepository extends AbstractRepository
{
    /**
     * VoteRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $request
     *
     * @return Vote
     */
    public function create(array $request): Vote
    {
        return Vote::create([
            'match_id' => $request['match'],
            'flop' => $request['flop_text'],
            'flop_candidate_id' => $request['flop_candidate'],
            'top' => $request['top_text'],
            'top_candidate_id' => $request['top_candidate'],
            'is_read' => false,
        ]);
    }

    /**
     * @return Builder
     */
    public function getAll(): Builder
    {
        return Vote::query();
    }

    /**
     * @return Builder
     */
    public function getUnreadVoteByMatch(Match $match): Builder
    {
        return Vote::query()
            ->where('is_read', false)
            ->where('match_id', $match->id);
    }



}
