<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'gender', 'birthday', 'email', 
        'phone', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educationEstablishments()
    {
        return $this->hasMany(EducationalEstablishment::class);
    } 

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }   

    public function languages()
    {
        return $this->hasMany(Language::class);
    }  

    public function workPlaces()
    {
        return $this->hasMany(WorkPlace::class);
    }    
}
