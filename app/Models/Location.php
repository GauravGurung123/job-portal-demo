<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory, Sluggable;
    
    public $timestamps = false;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    public function getRouteKeyName()
    {
     return 'slug';   
    }
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function employers()
    {
        return $this->hasMany('App\Models\Employer', 'location_id', 'id');
    }

    public function jobs()
    {
        return $this->hasMany('App\Models\Job', 'location_id', 'id');
    }

}
