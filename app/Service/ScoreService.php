<?php

namespace App\Service;



use App\Models\Database\Candidate;
use App\Models\Database\Match;
use App\Models\Database\Score;
use App\Models\Database\Vote;
use App\Repository\CandidateRepository;
use App\Repository\MatchRepository;
use App\Repository\ScoreRepository;
use Illuminate\Database\Eloquent\Collection;

class ScoreService extends AbstractService
{
    /**
     * @var ScoreRepository
     */
    protected $_scoreRepository;

    /**
     * @var CandidateRepository
     */
    protected $_candidateRepository;

    /**
     * @var MatchRepository
     */
    protected $_matchRepository;

    public function __construct(
        ScoreRepository $scoreRepository,
        CandidateRepository $candidateRepository,
        MatchRepository $matchRepository
    )
    {
        parent::__construct();
        $this->_scoreRepository = $scoreRepository;
        $this->_candidateRepository = $candidateRepository;
        $this->_matchRepository = $matchRepository;
    }

    public function createScore(array $data): Score
    {
        return $this->_scoreRepository->create($data);
    }

    public function updateSimpleScore(Vote $vote)
    {
        // TOP
        if(!$this->candidateHasScore($vote->top_candidate, $vote->match))
        {
            $score = $this->_scoreRepository->create($vote->top_candidate, $vote->match);
            $this->_scoreRepository->addOneScoreTop($score);
        }
        else
        {
            $score = $this->_scoreRepository->getCandidateScore($vote->top_candidate, $vote->match);
            $this->_scoreRepository->addOneScoreTop($score);
        }

        // FLOP
        if(!$this->candidateHasScore($vote->flop_candidate, $vote->match))
        {
            $score = $this->_scoreRepository->create($vote->flop_candidate, $vote->match);
            $this->_scoreRepository->addOneScoreFlop($score);
        }
        else
        {
            $score = $this->_scoreRepository->getCandidateScore($vote->flop_candidate, $vote->match());
            $this->_scoreRepository->addOneScoreFlop($score);
        }
    }

    public function updateLastScore(Vote $vote)
    {
        // TOP
        if(!$this->candidateHasScore($vote->top_candidate, $vote->match))
        {
            $score = $this->_scoreRepository->create($vote->top_candidate, $vote->match);
            $this->_scoreRepository->addOneScoreTop($score);
        }
        else
        {
            $score = $this->_scoreRepository->getCandidateScore($vote->top_candidate, $vote->match);
            $this->_scoreRepository->addTwoScoreTop($score);
        }

        // FLOP
        if(!$this->candidateHasScore($vote->flop_candidate, $vote->match))
        {
            $score = $this->_scoreRepository->create($vote->flop_candidate, $vote->match);
            $this->_scoreRepository->addOneScoreFlop($score);
        }
        else
        {
            $score = $this->_scoreRepository->getCandidateScore($vote->flop_candidate, $vote->match);
            $this->_scoreRepository->addTwoScoreFlop($score);
        }
    }

    public function candidateHasScore(Candidate $candidate, Match $match): bool
    {
        return $this->_scoreRepository->candidateHasScore($candidate, $match);
    }

    public function getCandidateScore(Candidate $candidate, Match $match): Score
    {
        return $this->_scoreRepository->getScoreForMatch($candidate, $match);
    }

    public function getAllScoreForMatch(int $match_id) : Collection
    {
        $match = $this->_matchRepository->getMatchById($match_id);

        return $this->_scoreRepository->getAllScoreByMatch($match)->get();
    }

    public function getAllTopForMatch(Match $match) : Collection
    {
        return $this->_scoreRepository->getAllTopByMatch($match)->get();
    }

    public function getAllFlopForMatch(Match $match) : Collection
    {
        return $this->_scoreRepository->getAllFlopByMatch($match)->get();
    }

    public function getAllGhostsForMatch(Match $match) : Collection
    {
        return $this->_candidateRepository->getAllGhostsByMatch($match)->get();
    }

    public function getTopForMatch(int $match_id) : Collection
    {
        // TODO
        $match = $this->_matchRepository->getMatchById($match_id);

        return $this->_candidateRepository->getAllGhostsByMatch($match)->get();
    }

    public function getFlopForMatch(int $match_id) : Collection
    {
        // TODO
        $match = $this->_matchRepository->getMatchById($match_id);

        return $this->_candidateRepository->getAllGhostsByMatch($match)->get();
    }
}
