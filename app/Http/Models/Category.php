<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'category_id',
    ];

    public function subCategories(){
        return $this->hasOne('App\Models\Category');
    }

    public function categories(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function ads()
    {
        return $this->belongsToMany('App\Models\Ad')->latest();
    }
}
