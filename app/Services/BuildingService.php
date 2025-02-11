<?php

namespace App\Services;

use App\Repositories\BuildingRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BuildingService
{
    protected BuildingRepository $buildingRepository;

    public function __construct(BuildingRepository $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
    }

    public function listBuildings(): Collection
    {
        return $this->buildingRepository->getAll();
    }
    public function listBuildingTasksWithComments(int $building_id): Model|Collection|Builder|array|null
    {
        return $this->buildingRepository->getTasksWithComments($building_id);
    }
}
