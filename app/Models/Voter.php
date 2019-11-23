<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Match
 *
 * @package App\Models\Database
 */
class Voter extends Eloquent
{

    public $timestamps = false;


    protected $fillable = [
        'name',
        'firstname',
    ];

    public function matches()
    {
        return $this->belongsToMany(Match::class,'voter_match', 'voter_id', 'match_id');
    }


    /**

    protected $casts = [
        'address_id' => 'int'
    ];


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
