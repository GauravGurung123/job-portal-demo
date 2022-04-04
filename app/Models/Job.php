<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'employer_id',
        'skill_id',
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
}
