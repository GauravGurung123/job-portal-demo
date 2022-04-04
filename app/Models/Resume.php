<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobseeker_id',
        'education',
        'training',
        'experience',
        'language',
        'social_links',
        'cv_path',
    ];
}
