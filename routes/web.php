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
});


Route::get('/team', function () {
    return view('team.team');
});


Route::get('/player', function () {
    return view('player.player');
});


Route::get('/player', 'PlayerController@showTeam');




Route::get('/tournament', function () {
    return view('matches.matche');
});

Route::get('/tournament', 'TournamentController@showTeam');

Route::get('/score', function () {
    return view('scores.score');
});

Route::get('/score', 'ScoreController@showTournament');


Route::get('/score', 'ScoreController@showTeam');

Route::get('home', 'HomeController@Home');

Route::get('sports/home', 'TournamentController@listAllmatches');



