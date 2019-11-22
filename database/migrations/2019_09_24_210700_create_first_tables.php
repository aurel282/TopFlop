<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voter', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('firstName')->nullable();
        });

        Schema::create('match', function (Blueprint $table) {
            $table->increments('id');
            $table->text('opponent');
            $table->dateTime('date');
        });

        Schema::create('candidate', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
        });

        Schema::create('vote', function (Blueprint $table) {
            $table->increments('id');
            $table->text('top');
            $table->integer('top_candidate_id')->unsigned();
            $table->foreign('top_candidate_id')->references('id')->on('candidate');
            $table->text('flop');
            $table->integer('flop_candidate_id')->unsigned();
            $table->foreign('flop_candidate_id')->references('id')->on('candidate');
            $table->boolean('is_read');
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('match');
        });


        Schema::create('has_voted', function (Blueprint $table) {
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('match');
            $table->integer('voter_id')->unsigned();
            $table->foreign('voter_id')->references('id')->on('voter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voter');
        Schema::dropIfExists('match');
        Schema::dropIfExists('candidate');
        Schema::dropIfExists('vote');
        Schema::dropIfExists('has_voted');
    }
}
