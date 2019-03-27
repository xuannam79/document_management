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
    public $timestamps = true;

    protected $fillable = [
        'name',
        'is_active',
    ];

    public function departmentUser()
    {
        return $this->hasMany(DepartmentUser::class);
    }

    public function infrastucture()
    {
        return $this->hasMany(Infrastructure::class);
    }

}
