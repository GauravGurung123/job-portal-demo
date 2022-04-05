<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

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

    public function employers()
    {
        return $this->hasMany('App\Models\Employer', 'industry_id', 'id');
    }
}

