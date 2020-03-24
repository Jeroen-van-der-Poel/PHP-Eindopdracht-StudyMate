<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function deadlines()
    {
        return $this->belongsToMany(Deadline::class);
    }
}
