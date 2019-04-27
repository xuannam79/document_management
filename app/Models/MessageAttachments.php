<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageAttachments extends Model
{
    protected $table = 'messages_attachments';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'messages_id',
        'name',
    ];

    
}
