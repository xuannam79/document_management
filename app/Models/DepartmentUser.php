<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Position;
use Carbon\Carbon;

class DepartmentUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'department_users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'department_id', 
        'user_id',
        'position_id',
        'start_date',
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getDateAttribute($value)
    {
        return Carbon::createFromFormat('mm/dd/yyyy', $value)->format('d/m/Y');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }
}
