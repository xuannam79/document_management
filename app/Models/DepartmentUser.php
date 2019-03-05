<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Position;

class DepartmentUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_id', 
        'user_id',
        'position_id',
        'start_date',
        'end_date'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function position()
    {
        $this->belongsTo(Position::class);
    }

    public function department()
    {
        $this->belongsTo(Department::class);
    }
}
