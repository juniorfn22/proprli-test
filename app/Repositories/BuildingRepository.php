<?php

namespace App\Repositories;

use App\Models\Building;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BuildingRepository
{
    public function getAll(): Collection
    {
        return Building::all();
    }

    public function getTasksWithComments(int $building_id): Model|Collection|Builder|array|null
    {
        return Building::with('tasks.comments')->find($building_id);
    }
}
