<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReplyDocument extends Model
{
    protected $table = 'reply_document';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'document_id',
        'user_id',
        'content_reply',
        'file_attachment_reply',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
