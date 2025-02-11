<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository
{
    public function getAll(): Collection
    {
        return Comment::with('user','task')->get();
    }

    public function createComment($data)
    {
        return Comment::create($data);
    }
}
