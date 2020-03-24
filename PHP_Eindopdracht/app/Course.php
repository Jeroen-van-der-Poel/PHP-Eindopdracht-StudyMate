<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function teachers()
    {
        return $this->BelongsToMany(Teacher::class);
    }

    public function deadlines()
    {
        return $this->hasMany(Deadline::class);
    }
}
