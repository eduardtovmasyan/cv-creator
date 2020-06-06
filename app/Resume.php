<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    public function education_establishments()
    {
        return $this->hasMany();
    } 

    public function skills()
    {
        return $this->hasMany();
    }   

    public function languages()
    {
        return $this->hasMany();
    }  

    public function work_paces()
    {
        return $this->hasMany();
    }    
}
