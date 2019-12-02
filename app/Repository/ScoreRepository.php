<?php

namespace App\Repository;


use App\Models\Database\Candidate;
use App\Models\Database\Match;
use App\Models\Database\Score;
use Illuminate\Database\Eloquent\Builder;

class ScoreRepository extends AbstractRepository
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
     * @return Score
     */
    public function create(array $request): Score
    {
        return Score::create([
            'match_id' => $request['match_id'],
            'candidate_id' => $request['candidate_id'],
            'score_flop' => $request['candidate_id'],
            'score_top' => false,
        ]);
    }



    /**
     * @return Builder
     */
    public function getAllScoreByMatch(Match $match): Builder
    {
        return Score::query()
            ->where('match_id', $match->id);
    }

    /**
     * @param Candidate $candidate
     * @param Match     $match
     *
     * @return bool
     */
    public function hasScoreForMatch(Candidate $candidate, Match $match): bool
    {
        return Score::query()
                    ->where('candidate_id', $candidate->id)
                    ->where('match_id', $match->id)
                    ->exist();
    }

    /**
     * @param Candidate $candidate
     * @param Match     $match
     *
     * @return Score|null
     */
    public function getScoreForMatch(Candidate $candidate, Match $match): ?Score
    {
        return Score::query()
                    ->where('candidate_id', $candidate->id)
                    ->where('match_id', $match->id)
                    ->first();
    }

}
