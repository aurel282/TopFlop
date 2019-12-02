<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    })
    ->name('home');

Route::get('/results', 'ResultController@getResult')
     ->name('result');

Route::get('/match/create', 'MatchController@getCreate')
     ->name('match.create');
Route::post('/match/create', 'MatchController@postCreate')
     ->name('match.create');

Route::get('/voter/create', 'VoterController@getCreate')
     ->name('voter.create');
Route::post('/voter/create', 'VoterController@postCreate')
     ->name('voter.create');

Route::get('/candidate/create', 'CandidateController@getCreate')
     ->name('candidate.create');
Route::post('/candidate/create', 'CandidateController@postCreate')
     ->name('candidate.create');

Route::get('/vote/create', 'VoteController@getCreate')
     ->name('vote.create');
Route::post('/vote/create', 'VoteController@postCreate')
     ->name('vote.create');

Route::get('/result/select_match', 'ResultController@getMatchOfResult')
     ->name('result.select_match');
Route::post('/result/select_match', 'ResultController@postMatchOfResult')
     ->name('result.select_match');

Route::get('{match}/result/show', 'ResultController@getReadVote')
     ->name('result.show');
Route::post('{match}/result/show', 'ResultController@postReadVote')
     ->name('result.show');
