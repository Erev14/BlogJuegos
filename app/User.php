<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the profile associated with the user.
     */
    public function profile() {
        return $this->hasOne('App\Profile', 'user_id');
    }

    /**
     * Get the blog publications from the user.
     */
    public function publications() {
        return $this->hasMany('App\Publication');
    }

    /**
     * The users that belong to the publication.
     */
    public function likes() {
        return $this
            ->belongsToMany('App\Publication','publications_likes_users', 'user_id', 'publication_id')
            ->as('likes');
    }

}
