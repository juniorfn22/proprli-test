<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\Task;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    public function getAll($filters = []): LengthAwarePaginator
    {
        return Task::with(['building', 'user', 'comments'])
        ->when(isset($filters['status']), fn ($query) => $query->where('status', $filters['status']))
            ->when(isset($filters['building_id']), fn ($query) => $query->where('building_id', $filters['building_id']))
            ->when(isset($filters['user_id']), fn ($query) => $query->where('user_id', $filters['user_id']))
            ->when(isset($filters['date_range']), function ($query) use ($filters) {
                $dates = explode(',', $filters['date_range']);
                $query->whereBetween('created_at', [$dates[0], $dates[1]]);
            })
            ->paginate(10);
    }

    public function createTask($data)
    {
        return Task::create($data);
    }
}
