<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{

    use SoftDeletes;
    protected $table = 'players';
    
    protected $fillable = ['player_name', 'team_id'];



    public function teams() {
        return $this->belongsTo('App\Team', 'team_id');
    }


    public function scores() {
        return $this->hasMany('App\Score','player_id');
    }


    
}
