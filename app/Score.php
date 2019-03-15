<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{

	protected $table = 'scores';
    protected $fillable = ['no_of_scores', 'tournament_id', 'player_id'];


     public function tournaments() {
        return $this->belongsTo('App\Tournament', 'tournament_id');
    }

    public function player() {
        return $this->belongsTo('App\Player', 'player_id');
    }

	public function teams() {
        return $this->belongsToMany(Team::class, 'score_team');

    }




	public function team() {
        return $this->belongsToMany(Score::class, 'score_team');

    }

    public function tournament() {
        return $this->belongsToMany(Tournament::class, 'score_team')->withPivot('team_id');

    }

  public function scores() {
        return $this->belongsTo('App\Score', 'id','no_of_scores');
    }

public function score_team() {
        return $this->belongsTo('App\Score', 'id','no_of_scores');
    }

}
