<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory, Sluggable;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'employer_id',
        'location_id',
        'industry_id',
        'title',
        'application_email',
        'application_url',
        'job_type',
        'description',
        'responsibility',
        'requirement',
        'experience',
        'min_salary',
        'max_salary',
        'status',
        'featured',
        'top_job',
        'last_date',
        'views',
        'openings',
        'slug',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * jobs required many skills 
     * skills have polymorphic relationship
     * 
     * @return void
     */
    public function skills()
    {
        return $this->morphMany('App\Models\Skill', 'skillable');
    }
    
    /**
     * job belongs to employer
     *
     * @return void
     */
    public function employer()
    {
        return $this->belongsTo('App\Models\Employer', 'employer_id', 'id');
    }
 
    public function jobFavorite()
    {
        return $this->hasOne('App\Models\JobFavorite', 'job_id', 'id');
    }

    public function jobApplications()
    {
        return $this->hasMany('App\Models\JobApplication', 'job_id', 'id');
    }

    /**
     * Job belongs to only one location
     *
     * @return void
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id', 'id');
    }
    
    /**
     * Job belongs to only one Industry
     *
     * @return void
     */
    public function industry()
    {
        return $this->belongsTo('App\Models\Industry', 'industry_id', 'id');
    }
    
}

