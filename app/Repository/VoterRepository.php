<?php

namespace App\Repository;


use App\Models\Database\Voter;
use Illuminate\Database\Eloquent\Builder;

class VoterRepository extends AbstractRepository
{
    /**
     * VoterRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $request
     *
     * @return Voter
     */
    public function create(array $request): Voter
    {
        return Voter::create([
            'name' => $request['name'],
            'firstname' => key_exists('firstname',$request)? $request['firstname'] : '',
        ]);
    }

    /**
     * @return Builder
     */
    public function getAll(): Builder
    {
        return Voter::query();
    }

}
