<?php
namespace App\Repositories\Team;

interface TeamRepository

{
	public function create(array $attributes);

	public function update($id, array $attributes);

	public function delete($id);

	public function listAll();

	public function listById($id);

	public function playersByTeam($id);

}