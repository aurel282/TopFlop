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

    public function getAllMatchesOpenForVotes(): Collection
    {
        return $this->_matchRepository->getAllMatchesOpenForVotes()->get();
    }

    public function getMatchById(int $match_id): ?Match
    {
        return $this->_matchRepository->getMatchById($match_id);
    }

    public function closeVote(int $match_id): bool
    {
        $match = $this->_matchRepository->getMatchById($match_id);
        return $this->_matchRepository->close_vote($match);
    }

}
