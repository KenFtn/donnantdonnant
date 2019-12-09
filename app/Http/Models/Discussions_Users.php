<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discutions_Users extends Model
{
    protected $table = 'discussion_user';

    protected $fillable = [
        'discussion_id',
        'users_id',
    ];
}
