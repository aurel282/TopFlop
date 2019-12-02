<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Score
 *
 * @package App\Models\Database
 */
class Score extends Eloquent
{

    public $timestamps = false;


    protected $fillable = [
        'match_id',
        'score_flop',
        'score_top',
        'candidate_id'
    ];

    public function match()
    {
        return $this->hasOne(Match::class);
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

}
