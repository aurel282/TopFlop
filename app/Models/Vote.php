<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Match
 *
 * @package App\Models\Database
 */
class Vote extends Eloquent
{

    public $timestamps = false;

    protected $casts = [
        'match_id' => 'int',
        'flop_candidate_id' => 'int',
        'top_candidate_id' => 'int',

    ];


    protected $fillable = [
        'match_id',
        'flop',
        'flop_candidate_id',
        'top',
        'top_candidate_id',
        'is_read',
    ];

    public function flop_candidate()
    {
        return $this->hasOne(Candidate::class, 'id', 'flop_candidate_id');
    }

    public function top_candidate()
    {
        return $this->hasOne(Candidate::class, 'id', 'top_candidate_id');
    }

    public function match()
    {
        return $this->hasOne(Match::class);
    }

    /**

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function number_products()
    {
        return count($this->products()->get());
    }


     */


}
