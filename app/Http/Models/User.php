<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'city_id', 'cagnotte'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ads(){
        return $this->hasMany(Ad::class, 'author_id', 'id');
    }

    public function cities(){
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'user_id','id');
    }

    public function adResponse()
    {
        return $this->belongsToMany(Ad::class);
    }

    public function discussions(){
        return $this->belongsToMany(Discussion::class);
    }

    public function messages(){
        return $this->hasMany(Message::class, 'author_id','id');
    }
}
