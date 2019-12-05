<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdUser extends Model
{
    protected $table = 'ad_user';

    protected $fillable = [
        'user_id',
        'ad_id',
    ];

    public function ad_id(){
        return $this->hasOne(Ad::class); 
    }

    public function user_id(){
        return $this->hasOne(User::class);
    }
}
