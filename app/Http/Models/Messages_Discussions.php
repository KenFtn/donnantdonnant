<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages_Discutions extends Model
{
    protected $table = 'message_discussion';

    protected $fillable = [
        'message_id',
        'discussion_id',
    ];
}
