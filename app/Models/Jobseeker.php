<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Jobseeker extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'username',
        'name',
        'content',
        'phone_no',
        'current_address',
        'permanent_address',
        'website',
        'dob',
        'gender',
        'status',
        'social_links',
        'profile_photo_path',
        'slug',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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
    
    public function skills()
    {
        return $this->morphMany('App\Models\Skill', 'skillable');
    }

    public function role()
    {
        return $this->hasOne('App\Models\Role');
    }

    public function resume()
    {
        return $this->hasOne('App\Models\Resume');
    }

    public function jobApplications()
    {
        return $this->hasMany('App\Models\JobApplication', 'jobseeker_id', 'id');
    }

    public function jobseekerFavorites()
    {
        return $this->hasMany('App\Models\JobseekerFavorite', 'jobseeker_id', 'id');
    }

}