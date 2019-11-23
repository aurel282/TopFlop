<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('score_top');
            $table->integer('score_flop');
            $table->integer('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
