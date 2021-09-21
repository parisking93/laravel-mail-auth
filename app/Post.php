<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];

    public function category() {
        // MOLTI
        return $this->belongsTo('App\Category', 'category_id' , 'id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
