<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Model\user\tag', 'post_tags')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\user\category', 'category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->belongsToMany('App\Model\admin\admin');
    }
}
