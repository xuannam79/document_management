<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'title',
        'content',
    ];
}
