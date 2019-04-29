<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'comment'
    ];
}
