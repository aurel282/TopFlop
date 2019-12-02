<?php

namespace App\Service;



use App\Models\Database\Match;
use App\Models\Database\Score;
use App\Repository\MatchRepository;
use App\Repository\ScoreRepository;
use Illuminate\Database\Eloquent\Collection;

class ScoreService extends AbstractService
{
    /**
     * @var ScoreRepository
     */
    protected $_scoreRepository;

    public function __construct(
        ScoreRepository $scoreRepository
    )
    {
        parent::__construct();
        $this->_scoreRepository = $scoreRepository;
    }

    public function createScore(array $data): Score
    {
        return $this->_scoreRepository->create($data);
    }
}
