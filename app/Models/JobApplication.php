<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'jobseeker_id',
        'job_id',
        'cv_path',
        'status',

    ];

    public function jobseeker()
    {
        return $this->belongsTo('App\Models\Jobseeker', 'jobseeker_id', 'id');
    }
    
    public function job()
    {
        return $this->belongsTo('App\Models\Job', 'job_id', 'id');
    }
}
