<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Team;
use App\Score;
use App\Tournament;


class ScoreController extends Controller
{
    public function create(Request $request, $id)
    {
        $request->validate([
            'no_of_scores' => 'required|integer'
        ]);


        $scoredata = $request->all();
        $scoredata['tournament_id'] = $id;
        $score = Score::create($scoredata);
        $player = Player::find($request->player_id);
        $score->player_id = $player->id;
        $team = Team::find($request->team_name);
        $score->teams()->attach($player->team_id, ['tournament_id' => $id] );
        $score->save();
       	$score = score::all();
       
       	return view('scores.allscores', compact('score'));
    }

 

    public function listAll()
    {
        $score = Score::get();
   
        return view('scores.allscores', ['score' => $score]);

    }


    public function tournamentId($id)
    {
        $tournament =Tournament::find($id);
        $player = Player::all();
          
        return view('scores.score', compact('tournament', 'player'));

    }

    public function showTournament()
    {
        $tournament =Tournament::find();

        return view('scores.score', compact('tournament'));
    }


    public function scoreByTournament($id)
    {   
        $score =  Score::where('tournament_id', '=', $id)->get();

        return view('scores.allscores', ['score' => $score]);
    }

   /* public function scoreByTeam($id)
    {
      $score = Tournament::whereHas('teams', function ($query) use ($id) {
            return $query->where('teams.id', $id);
        })->with('teams')->get();
    
       return view('team.read', ['score' => $score]);
    }*/

        public function teamscores($id)
        {
            //$tournament = Tournament::find($id);

            $team = Team::with('players', 'players.scores', 'tournament','tournaments')->find($id);
        //     $tournament = Tournament::whereHas('teams', function ($query) use ($id) {
        //     return $query->where('teams.id', $id);
        // })->get();
        //     foreach($tournament as $tournaments)
        //     {
        //         $tournament= $tournaments->tournament_name;
        //     }

            foreach($team->players as $player) {

            $player->score = $player->scores->sum('no_of_scores');
        }
              
              // $team = $team->toArray();dd($team); 
              
              return view('team.read', compact('team'));
           

        }

}
