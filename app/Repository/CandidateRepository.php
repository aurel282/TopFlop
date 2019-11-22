<?php

namespace App\Repository;


use App\Models\Database\Candidate;
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

}
