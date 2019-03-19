<?php

namespace App\Http\Controllers;

use App\Repositories\Team\TeamRepository;
use App\Team;
use App\Player;
use App\Tournament;
use Illuminate\Http\Request;


class TeamController extends Controller
{

    public function __construct(TeamRepository $team)
    {
        $this->team = $team;
    }

    public function create(Request $request)
    {
        
        


        $teams =  $this->team->create($request->all());
        
$player = Player::all();
 $tournament = Tournament::get();
       return view('cms',  compact('teams', 'player', 'tournament'));
    }

    public function update(Request $request, $id)
    {

     
        $teams = Team::find($id);
        $teams->update($request->all());
        $teams = Team::all();
        $player = Player::all();
        $tournament = Tournament::get();
        return view('cms', compact('teams', 'player', 'tournament'));

    }


    public function delete(Request $request)
    {

        

        $this->team->delete($request->id);
        $teams = $this->team->listAll();
        return view('cms', ['teams' => $teams]);

    }

    public function listAll()
    {


       $teams =  $this->team->listAll();
       $player = Player::all();
       $tournament = Tournament::all();
       return view('team.allteams', compact('teams', 'player', 'tournament'));
    }


    public function listById($id)
    {
        $team = $this->team->listById($id);
       
        return view('team.update', ['team' => $team]);

    }

 public function playersByTeam($id)
    {
        
        $team = Player::where('team_id', '=', $id)->get();

        return view('team.playerbyteam', ['team' => $team]);


    }




}
