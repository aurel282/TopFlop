<?php

namespace App\Service;



use App\Models\Database\Voter;
use App\Repository\VoterRepository;
use Illuminate\Database\Eloquent\Collection;

class VoterService extends AbstractService
{
    /**
     * @var VoterRepository
     */
    protected $_voterRepository;

    public function __construct(
        VoterRepository $voterRepository
    )
    {
        parent::__construct();
        $this->_voterRepository = $voterRepository;
    }

    public function createVoter(array $data): Voter
    {
        return $this->_voterRepository->create($data);
    }

    public function getAllVoters(): Collection
    {
        return $this->_voterRepository->getAll()->get();
    }
}
