<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactoTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('match', 'matches');
        Schema::rename('vote', 'votes');
        Schema::rename('candidate', 'candidates');
        Schema::rename('voter', 'voters');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('matches', 'match');
        Schema::rename('votes', 'vote');
        Schema::rename('candidates', 'candidate');
        Schema::rename('voters', 'voter');
    }
}
