<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad_Category extends Model
{
    protected $table = 'ad_category';

    protected $fillable = [
        'category_id',
        'ad_id',
    ];
    
    public function category_id(){
        return $this->hasOne(Category::class); 
    }

    public function ad_id(){
        return $this->hasOne(Ad::class);
    }
}
