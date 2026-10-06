<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'description', 'task_date', 'is_archived'];
    protected $useTimestamps    = true;

    public function activeTasks(?int $limit = null): array
    {
        $query = $this->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->orderBy('id', 'ASC');

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $query->findAll();
    }
}
