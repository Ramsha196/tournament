<?php

namespace App\Http\Controllers;

use App\Team;
use App\Tournament;
use App\Player;
use Illuminate\Http\Request;

class HomeController extends Controller
{
      public function Home()
      { 
        $tournaments = Tournament::with('teams')->get();

        return view('sports.index', ['tournaments' => $tournaments]);

      }



      public function listAllTeams()
      {
    	$teams = Team::all();
      $player = Player::with('teams')->get();
      $tournament = Tournament::get();
     
      return view('cms', compact('teams', 'player', 'tournament'));
    
      }

      
}
