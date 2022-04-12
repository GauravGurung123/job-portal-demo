<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Employer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    // protected $guard_name = 'employer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'industry_id',
        'location_id',
        'username',
        'org_name',
        'content',
        'phone_no',
        'website',
        'status',
        'social_links',
        'profile_photo_path',
        
        'email',
        'password',
        'token',
        'token_expiry',
        'last_logged_in',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'token',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * employers required many skills 
     * skills have polymorphic relationship
     * 
     * @return void
     */
    public function skills()
    {
        return $this->morphMany('App\Models\Skill', 'skillable');
    }
    
    /**
     * Employer belongs to only one industry
     *
     * @return void
     */
    public function industry()
    {
        return $this->belongsTo('App\Models\Industry', 'industry_id', 'id');
    }
    
    /**
     * employer belongs to only one location
     *
     * @return void
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Industry', 'location_id', 'id');
    }
    
    /**
     * Employer have many jobs
     *
     * @return void
     */
    public function jobs()
    {
        return $this->hasMany('App\Models\Job', 'employer_id', 'id');
    }


}
