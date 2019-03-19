<?php

namespace App\Http\Controllers;

use App\Repositories\Team\TeamRepository;
use App\Tournament;
use Illuminate\Http\Request;
use App\Team;


class TournamentController extends Controller
{


    public function create(Request $request)
    {
        $request->validate([
            'tournament_name' => 'required|string',
            'team_id' => 'required|array|exists:teams,id'
        ]);

        $tournament = Tournament::create($request->all());
        $team = Team::find($request->team_id);
        $tournament->teams()->attach($team);
        $tournament->save();
        $tournament = Tournament::get();
        return view('matches.allmatches', ['tournament' => $tournament]);
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'tournament_name' => 'required|string',
            'team_id' => 'required|exists:teams,id',
        ]);

        $tournament = Tournament::find($id);
        $tournament->update($request->all());
        $team = Team::find($request->team_id);
        $tournament->teams()->sync($team);
        $tournament->save();
        $tournament = Tournament::all();
       return view('matches.allmatches', ['tournament' => $tournament]);
    }


    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:tournaments,id'
        ]);

        $tournament = Tournament::find($request->id);
        $tournament->delete();
        $tournament = Tournament::all();

       return view('matches.allmatches', ['tournament' => $tournament]);
    }


    public function listAll()
    {
        $tournament = Tournament::with('teams')->get();
        $team = Team::get();
        return view('matches.allmatches', compact('tournament', 'team'));
    }

    public function showTeam()
    {

        $team = Team::all();

        return view('matches.matche', ['team' => $team]);
    }


      public function listById($id)
    {


      $tournament =Tournament::find($id);

        $team = Team::all();
        return view('matches.update', compact('tournament', 'team'));

    }

   public function teamsByTournament($id)
    {
        

      
       $team =  Team::whereHas('tournaments', function ($query) use ($id) {
            return $query->where('tournaments.id', $id);
        })->with('tournaments', 'teamname')->get();

       return view('matches.read', compact('team'));

    }

 public function listAllmatches()
    {
        $tournaments = Tournament::with('teams')->get();
   
       return view('sports.index', ['tournaments' => $tournaments]);
    }

}