<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trail extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'trails_courses');
    }
}
