<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleWeek extends Model
{
    protected $table = 'scheduleweek';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'start',
        'end',
        'content',
        'note',
        'user_id',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
