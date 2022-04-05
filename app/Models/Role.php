<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
        
    /**
     * jobseeker role 
     *
     * @return void
     */
    public function jobseeker()
    {
        return $this->belongsTo('App\Models\Jobseeker');
    }
        
    /**
     * employer role
     *
     * @return void
     */
    public function employer()
    {
        return $this->belongsTo('App\Models\Employer');
    }
}
