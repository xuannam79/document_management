<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentUser extends Model
{
    protected $table = 'document_user';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'document_id',
        'user_id',
        'is_seen',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
