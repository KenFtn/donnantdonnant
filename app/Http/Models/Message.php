<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content', 'author_id'
    ];

    public function discussions()
    {
        return $this->belongsToMany(Discussion::class, 'message_discussion');
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
