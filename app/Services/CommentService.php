<?php

namespace App\Services;

use App\Repositories\BuildingRepository;
use App\Repositories\CommentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CommentService
{
    protected CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function listComments(): Collection
    {
        return $this->commentRepository->getAll();
    }

    public function createComment($data)
    {
        return $this->commentRepository->createComment($data);
    }
}
