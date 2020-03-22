<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

    public function HasTaught(){
        if ($this->has_taught == 1){
            return "Ja";
        }else{
            return "nee";
        }
    }

    public function courses()
    {
        return $this->BelongsToMany(Course::class);
    }
}
