<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function IsCoordinator($id){
        if($id != ""){
            return Teacher::where('id', $id)->firstOrFail()->name;
        }
        else {
            return "";
        }
    }

    public function teachers()
    {
        return $this->BelongsToMany(Teacher::class);
    }

    public function course()
    {
        return $this->hasOne('App\Upload');
    }

    public function deadlines()
    {
        return $this->hasMany(Deadline::class);

    }

}
