<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkPlace extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'position', 'place', 'start', 'end', 'resume_id',
    ];
}
