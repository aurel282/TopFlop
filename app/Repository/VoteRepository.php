<?php

namespace App\Repository;


use App\Models\Database\Vote;
use Illuminate\Database\Eloquent\Builder;

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
            'name' => $request['name'],
        ]);
    }

    /**
     * @return Builder
     */
    public function getAll(): Builder
    {
        return Vote::query();
    }

}
