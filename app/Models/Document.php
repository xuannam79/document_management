<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'document_number',
        'document_type_id',
        'content',
        'publish_date',
        'department_id',
        'user_id',
    ];

    public function documentType()
    {
        return $this->hasMany(DocumentType::class);
    }
    public function documentUser()
    {
        return $this->hasMany(DocumentUser::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
