<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'type',
        'status',
        'city_id',
        'price',
        'title',
        'desc',
        'slug',
        'author_id',
        'user_id',
    ];
    
    public function cities(){
        return $this->belongsTo(Cities::class);
    }

    public function author(){
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}
