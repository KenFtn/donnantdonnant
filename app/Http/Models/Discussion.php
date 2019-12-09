<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Discussion extends Model
{
    protected $fillable = [
        'ads_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->where('users.id', '!=', Auth::user()->id);
    }

    public function messages()
    {
        return $this->belongsToMany(Message::class, 'message_discussion');
    }
}
