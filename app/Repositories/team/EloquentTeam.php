<?php

namespace App\Repositories\Team;
use App\Player;
use App\Team;
use Illuminate\Http\Request;

class EloquentTeam implements TeamRepository
{
private $team;

	public function __construct(Team $team)
	{
		$this->team = $team;
	}

	public function create(array $attributes)
	{
		
       	$this->team->create($attributes);
        return $this->team->all();
         
	}

	public function update($id, array $attributes)
	{
		$team = $this->team->findOrFail($id);
		$team->update($attributes);
		return $team;
	}

	public function delete($id)
	{
		
		$this->team->findOrFail($id)->delete();
		return true;
	}


	public function listAll()
	{
		return $this->team->all();

	}

	public function listById($id)
	{
		return $this->findById($id);
	}

	public function playersByTeam($id)
	{
		return Player::where('team_id', '=', $id)->get();
	}

}