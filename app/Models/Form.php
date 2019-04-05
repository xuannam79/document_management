<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'form_management';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'department_id',
        'link',
        'description',
        'is_active',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
