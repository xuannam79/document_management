<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    protected $table = 'infrastructure';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'department_id',
        'amount',
        'picture',
        'is_active',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
