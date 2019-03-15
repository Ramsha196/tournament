<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'player'], function() {
    Route::post('create', 'PlayerController@create')->name('create');
    Route::post('update/{id}', ['as' => 'updatePlayer', 'uses' => 'PlayerController@update']);
    Route::post('delete/{id}', 'PlayerController@delete');
    Route::get('/', 'PlayerController@listall');
    Route::get('list_by_id/{player}', 'PlayerController@listById');

});

Route::group(['prefix' => 'team'], function() {
    Route::post('create', 'TeamController@create');
    Route::post('update/{id}', ['as' => 'updateTeam', 'uses' => 'TeamController@update']);
    Route::post('delete/{id}', 'TeamController@delete');
    Route::get('/', 'TeamController@listall');
    Route::get('list_by_id/{team}', 'TeamController@listById');
    Route::get('palyerByTeam/{team}', 'TeamController@playersByTeam');


});


Route::group(['prefix' => 'tournament'], function() {
    Route::post('create', 'TournamentController@create');
    Route::post('update/{id}',  ['as' => 'updateTournament', 'uses' => 'TournamentController@update']);
    Route::post('delete/{id}', 'TournamentController@delete');
    Route::get('/', 'TournamentController@listall');
    Route::get('list_by_id/{tournament}', 'tournamentController@listById');
    Route::get('team_by_tournament/{tournament}', 'tournamentController@teamsByTournament');

});

Route::group(['prefix' => 'score'], function() {
    Route::post('create/{id}', ['as' => 'createScore', 'uses' => 'ScoreController@create']);
    Route::post('update/{id}',  ['as' => 'updatescore', 'uses' => 'ScoreController@update']);
    Route::post('delete/{id}', 'ScoreController@delete');
    Route::get('/', 'ScoreController@listAll');
    Route::get('tournament_id/{score}', 'ScoreController@tournamentId');
    Route::get('players_scores/{score}', 'ScoreController@playersScore');
    Route::get('score_by_tournament/{tournament}', 'ScoreController@scoreByTournament');
    Route::get('teamscores/{team}', 'ScoreController@teamscores');

});

Route::group(['prefix' => 'cms'], function()
{
    Route::get('/', 'HomeController@listallTeams');
    
  
});

