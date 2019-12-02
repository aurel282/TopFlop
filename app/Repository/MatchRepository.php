<?php

namespace App\Repository;


use App\Models\Database\Match;
use Illuminate\Database\Eloquent\Builder;

class MatchRepository extends AbstractRepository
{
    /**
     * MatchRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $request
     *
     * @return Match
     */
    public function create(array $request): Match
    {
        return Match::create([
            'date' => $request['date'],
            'opponent' => $request['opponent'],
            'result_seen' => false,
            'vote_closed' => false,
        ]);
    }

    public function close_vote(Match $match): bool
    {
        return $match->update(
            [
            'vote_closed' => true,
        ]);
    }

    public function reopen_vote(Match $match): bool
    {
        return $match->update(
            [
                'vote_closed' => false,
                'result_seen' => false,
            ]);
    }

    /**
     * @return Builder
     */
    public function getAll(): Builder
    {
        return Match::query();
    }

    /**
     * @param int $match_id
     *
     * @return Match|null
     */
    public function getMatchById(int $match_id): ?Match
    {
        return Match::query()
                    ->where('id', $match_id)
                    ->first();
    }

}
