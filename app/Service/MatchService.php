<?php

namespace App\Service;



use App\Repository\MatchRepository;

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
}
