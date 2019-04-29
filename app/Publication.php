<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'urlCover',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'creation_date' => 'datetime',
    ];

    /**
     * The publications that belong to the user.
     */
    public function likes()
    {
        return $this
            ->belongsToMany('App\User', 'publications_likes_users', 'publication_id', 'user_id')
            ->as('likes');
    }

    /**
     * The publications that belong to the user.
     */
    public function savedPosts()
    {
        return $this
            ->belongsToMany('App\User', 'publications_saved_users', 'publication_id', 'user_id')
            ->as('savedPublications');
    }

    /**
     * The commentaries from the publication
     */
    public function commentaries()
    {
        return $this->hasMany('App\Commentary');
    }
}
