<?php

namespace App\Models;

use App\Models\DepartmentUser;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'departments';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function departmentUser()
    {
        $this->hasMany(DepartmentUser::class);
    }

}
