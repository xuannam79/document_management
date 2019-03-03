<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DepartmentUser;

class Position extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'positions';
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
