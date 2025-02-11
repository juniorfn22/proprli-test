<?php

namespace App\Services;

use App\Repositories\BuildingRepository;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    protected TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function listTasks($filters = []): LengthAwarePaginator
    {
        return $this->taskRepository->getAll($filters);
    }

    public function createTask($data)
    {
        return $this->taskRepository->createTask($data);
    }
}
