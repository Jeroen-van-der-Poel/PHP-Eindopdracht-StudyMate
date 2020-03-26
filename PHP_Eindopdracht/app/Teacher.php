<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Teacher extends Model
{
    protected $guarded = [];

    public function setNameAttribute($value){
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    public function getNameAttribute($value){
        return Crypt::decryptString($value);
    }

    public function setEmailAttribute($value){
        $this->attributes['email'] = Crypt::encryptString($value);
    }

    public function getEmailAttribute($value){
        return Crypt::decryptString($value);
    }

    public function HasTaught(){
        if ($this->has_taught == 1){
            return "Ja";
        }else{
            return "Nee";
        }
    }

    public function courses()
    {
        return $this->BelongsToMany(Course::class);
    }

    public function deadlines()
    {
        return $this->hasMany(Deadline::class);
    }
}
