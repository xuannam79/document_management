<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DepartmentUser;
use App\Models\Infrastructure;
use App\Models\Form;
use App\Models\ReplyDocument;
use App\Models\TimeTable;
use App\Models\CollaborationUnit;

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

    public function form()
    {
        return $this->hasMany(Form::class);
    }

    public function reply()
    {
        return $this->hasMany(ReplyDocument::class);
    }

    public function timeTable()
    {
        return $this->hasMany(TimeTable::class);
    }

    public function collaborationUnit()
    {
        return $this->hasMany(CollaborationUnit::class);
    }
}
