<?php

namespace App\Repositories\Department;

use App\Repositories\BaseRepository;
use App\Repositories\BaseInterface;
use App\Models\Department;

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
