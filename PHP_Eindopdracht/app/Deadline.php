<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $guarded = [];

    public function sortCategeorie(){

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
