<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentDepartment extends Model
{
    protected $table = 'document_department';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'document_id',
        'department_id',
        'array_user_seen',
        'is_approved',
        'sending_date',
    ];
}
