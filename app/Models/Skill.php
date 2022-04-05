<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'skillable_id',
        'skillable_type',
        'name',
        'slug',
    ];

    public function skillable()
    {
        return $this->morphTo();
    }
}
