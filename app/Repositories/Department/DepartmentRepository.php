<?php

namespace App\Repositories\Department;

use App\Models\Department;
use App\Repositories\BaseRepository;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function __construct(Department $department)
    {
        $this->model = $department;
    }

    public function all()
    {

        return $this->model->all();
    }
}
