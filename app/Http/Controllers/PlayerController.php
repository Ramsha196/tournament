<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Tournament;
use App\Team;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'player_name' => 'required|string',
            'team_id' => 'exists:teams,id'

        ]);

        $player = Player::create($request->all());
        $team = Team::find($request->team_name);
        $player->team_id = $team->id;
        $player->save();
        $player = Player::all();
$teams = Team::get();
        $tournament = Tournament::get();
          return view('cms', compact('teams', 'player', 'tournament'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'player_name' => 'required|string',
            'team_id' => 'exists:teams,id'

        ]);

        $player = Player::find($id);
        $player->update($request->all());
        $player->team_id = $request->get('team_id');
        $player->save();
        $player = Player::all();
        $teams = Team::get();
        $tournament = Tournament::get();
          return view('cms', compact('teams', 'player', 'tournament'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:players,id'
        ]);

        $player = Player::find($request->id);
        $player->delete();
        $player = Player::all();
        $teams = Team::get();
        $tournament = Tournament::get();
        return view('cms', compact('teams', 'player', 'tournament'));
    }

    public function listAll()
    {


        $player = Player::get();
   
        return view('player.allplayers', ['player' => $player]);

    }

    public function listById($id)
    {


        $player =Player::find($id);

        $team = Team::all();
        return view('player.update', compact('player', 'team'));

    }




    public function showTeam()
    {

        $team = Team::all();

        return view('player.player', ['team' => $team]);
    }

}
