<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'author_id',
        'user_id',
        'note',
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
