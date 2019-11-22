<?php

namespace App\Service;



use App\Models\Database\Candidate;
use App\Repository\CandidateRepository;
use Illuminate\Database\Eloquent\Collection;

class CandidateService extends AbstractService
{
    /**
     * @var CandidateRepository
     */
    protected $_candidateRepository;

    public function __construct(
        CandidateRepository $candidateRepository
    )
    {
        parent::__construct();
        $this->_candidateRepository = $candidateRepository;
    }

    public function createCandidate(array $data): Candidate
    {
        return $this->_candidateRepository->create($data);
    }

    public function getAllCandidates(): Collection
    {
        return $this->_candidateRepository->getAll()->get();
    }
}
