<?php

namespace App\Repository;


use App\Models\Database\Candidate;
use App\Models\Database\Match;
use App\Models\Database\Score;
use Illuminate\Database\Eloquent\Builder;

class CandidateRepository extends AbstractRepository
{
    /**
     * CandidateRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $request
     *
     * @return Candidate
     */
    public function create(array $request): Candidate
    {
        return Candidate::create([
            'name' => $request['name'],
        ]);
    }

    /**
     * @return Builder
     */
    public function getAll(): Builder
    {
        return Candidate::query();
    }

    /**
     * @param Match $match
     *
     * @return Builder
     */
    public function getAllGhostsByMatch(Match $match): Builder
    {
        $scores = Score::query()
            ->where('match_id', $match->id)
            ->get('candidate_id');

        return Candidate::query()
            ->whereNotIn('id', $scores);
    }


}
