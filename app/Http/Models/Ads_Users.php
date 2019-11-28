<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad_User extends Model
{
    public function ads_id(){
        return $this->hasOne(Ad::class); 
    }

    public function users_id(){
        return $this->hasOne(User::class);
    }
}
