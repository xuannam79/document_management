<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentAttachment extends Model
{
    protected $table = 'document_attachments';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'document_id',
        'name',
    ];
}
