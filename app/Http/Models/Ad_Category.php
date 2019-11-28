<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad_Category extends Model
{
    public function category_id(){
        return $this->hasOne(Category::class); 
    }

    public function ad_id(){
        return $this->hasOne(Ad::class);
    }
}
