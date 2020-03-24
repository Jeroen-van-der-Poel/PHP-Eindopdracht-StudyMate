<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $guarded = [];

    public $table = "uploads";

    public function course()
    {
        return $this->belongsTo('App\Courses');
    }
}
