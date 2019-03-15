<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $table = 'tournaments';
    protected $fillable = ['tournament_name'];

    public function teams(){
        return $this->belongsToMany(Team::class, 'team_tournament');

    }
  	public function tournamentname() {
        return $this->belongsTo('App\Tournament', 'tournament_name');
    }

    public function scores() {
        return $this->belongsToMany(Score::class, 'score_team')->withPivot('team_id');

    }

     public function team() {
        return $this->belongsToMany(Team::class, 'score_team')->withPivot('score_id');

    }


   
}
