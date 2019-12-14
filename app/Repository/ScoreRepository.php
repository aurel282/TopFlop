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
    public function create(Match $match, Candidate $candidate): Score
    {
        return Score::create([
            'match_id' => $request['match_id'],
            'candidate_id' => $request['candidate_id'],
            'score_flop' => 0,
            'score_top' => 0,
        ]);
    }

    public function addOneScoreTop(Score $score): bool
    {
        return $score->update([
            'score_top' => $score['score_top'] + 1,
        ]);
    }

    public function addTwoScoreTop(Score $score): bool
    {
        return $score->update([
            'score_top' => $score['score_top'] + 2,
        ]);
    }

    public function addOneScoreFlop(Score $score): bool
    {
        return $score->update([
            'score_flop' => $score['score_flop'] + 1,
        ]);
    }

    public function addTwoScoreFlop(Score $score): bool
    {
        return $score->update([
            'score_flop' => $score['score_flop'] + 2,
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
     * @return Builder
     */
    public function getAllTopByMatch(Match $match): Builder
    {
        return Score::query()
            ->where('match_id', $match->id)
            ->where('score_top', '>', 0);
    }

    /**
     * @return Builder
     */
    public function getAllFlopByMatch(Match $match): Builder
    {
        return Score::query()
            ->where('match_id', $match->id)
            ->where('score_flop', '>', 0);
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

    /**
     * @param Candidate $candidate
     * @param Match $match
     *
     * @return bool
     */
    public function candidateHasScore(Candidate $candidate, Match $match): bool
    {
        return Score::query()
            ->where('candidate_id', $candidate->id)
            ->where('match_id', $match->id)
            ->exists();
    }



}
