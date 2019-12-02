<?php

namespace App\Repository;


use App\Models\Database\Match;
use App\Models\Database\Vote;
use App\Models\Database\Voter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
    public function getUnreadVotesByMatch(Match $match): Builder
    {
        return Vote::query()
            ->where('is_read', false)
            ->where('match_id', $match->id);
    }

    /**
     * @return Builder
     */
    public function setRead(Vote $vote): bool
    {
        return $vote->update(
            [
                'is_read' => true
            ]
        );
    }

    /**
     * @param int $vote_id
     *
     * @return Vote|null
     */
    public function getVoteById(int $vote_id): ?Model
    {
        return Vote::query()
                   ->where('id', $vote_id)
                   ->first();
    }


}
