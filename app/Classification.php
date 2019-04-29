<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the blog publications from the classification.
     */
    public function publications()
    {
        return $this->hasMany('App\Publication');
    }
}
