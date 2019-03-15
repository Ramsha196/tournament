<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = ['team_name'];


    public function players() {
        return $this->hasMany(Player::class, 'team_id');
    }

    public function tournaments(){
        return $this->belongsToMany(Tournament::class, 'team_tournament');

    }


     public function teamname() {
        return $this->belongsTo(Team::class, 'team_name');
    }

     public function tournamentname() {
        return $this->belongsTo(Tournament::class, 'tournament_name');
    }

   
    public function scores() {
        return $this->belongsToMany(Score::class, 'score_team')->withPivot('score_id');
    }
     public function tournament() {
        return $this->belongsToMany(Score::class, 'score_team')->withPivot('tournament_id');
    }

}
