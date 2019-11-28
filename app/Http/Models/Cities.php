<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
            /**
     * The database table may be used by the model.
     *
     * @var string
     */
    protected $table = 'cities';
    /**
     * The that no timestamp are used.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'department_code', 'insee_code', 'zip_code', 'name', 'slug', 'gps_lat', 'gps_lng', 'multi',
    ];
    /**
     * Get the record of the department.
     *
     * @return \App\Departments
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Departments', 'department_code', 'code');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User', 'location', 'insee_code');
    }
}

