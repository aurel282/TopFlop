<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Match
 *
 * @package App\Models\Database
 */
class Match extends Eloquent
{

    public $timestamps = false;


    protected $fillable = [
        'opponent',
        'date',
        'result_seen',
        'vote_closed',
    ];

    public function voters()
    {
        return $this->belongsToMany(Voter::class);
    }

    /**

    protected $casts = [
        'address_id' => 'int'
    ];

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
