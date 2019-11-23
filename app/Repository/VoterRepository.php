<?php

namespace App\Repository;


use App\Models\Database\Match;
use App\Models\Database\Voter;
use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Integer;

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

    /**
     * @param int $voter_id
     * @param int $match_id
     *
     * @return bool
     */
    public function voterHasVoted(int $voter_id, int $match_id): bool
    {
        return Voter::query()
               ->where('id', $voter_id)
               ->whereHas( 'matches', function(Builder $query) use ($match_id) {
                   $query->where('match_id', $match_id);
               })->exists();
    }

    /**
     * @param int $voter_id
     *
     * @return Voter|null
     */
    public function getVoterById(int $voter_id): ?Voter
    {
        return Voter::query()
                    ->where('id', $voter_id)
                    ->first();
    }

}
