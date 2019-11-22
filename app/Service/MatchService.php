<?php

namespace App\Service;



use App\Models\Database\Match;
use App\Repository\MatchRepository;
use Illuminate\Database\Eloquent\Collection;

class MatchService extends AbstractService
{
    /**
     * @var MatchRepository
     */
    protected $_matchRepository;

    public function __construct(
        MatchRepository $matchRepository
    )
    {
        parent::__construct();
        $this->_matchRepository = $matchRepository;
    }

    public function createMatch(array $data): Match
    {
        return $this->_matchRepository->create($data);
    }

    public function getAllMatches(): Collection
    {
        return $this->_matchRepository->getAll()->get();
    }
}
