<?php

namespace App\Service;



use App\Models\Database\Match;
use App\Models\Database\Vote;
use App\Repository\VoteRepository;
use App\Repository\VoterRepository;
use http\Exception;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;

class VoteService extends AbstractService
{
    /**
     * @var VoteRepository
     */
    protected $_voteRepository;

    /**
     * @var VoterRepository
     */
    protected $_voterRepository;

    public function __construct(
        VoteRepository $voteRepository,
        VoterRepository $voterRepository
    )
    {
        parent::__construct();
        $this->_voteRepository = $voteRepository;
        $this->_voterRepository = $voterRepository;
    }

    /**
     * @param array $data
     *
     * @return Vote
     * @throws \Exception
     */
    public function createVote(array $data): Vote
    {

        if(!$this->_voterRepository->voterHasVoted((int)$data['match'], (int)$data['voter']))
        {
            $this->_voterRepository->getVoterById((int)$data['voter'])->matches()->attach((int)$data['match']);
            return $this->_voteRepository->create($data);
        }
        else
        {
            throw new \Exception();
        }
    }

    /**
     * @return Collection
     */
    public function getAllVotes(): Collection
    {
        return $this->_voteRepository->getAll()->get();
    }

    /**
     * @return bool
     */
    public function voterHasVoted(): Boolean
    {
        return $this->_voteRepository->getAll()->get();
    }

    /**
     * @param Match $match
     *
     * @return Collection
     */
    public function getUnreadVotesByMatch(Match $match): Collection
    {
        return $this->_voteRepository->getUnreadVotesByMatch($match)->get();
    }
}
