<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

    public function courses()
    {
        return $this->BelongsToMany(Course::class);
    }
}
