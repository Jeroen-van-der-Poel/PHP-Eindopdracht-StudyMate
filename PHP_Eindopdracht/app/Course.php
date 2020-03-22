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
}
