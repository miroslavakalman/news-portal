<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'category', 'content', 'tags', 'image',
    ];
    public function comments()
{
    return $this->hasMany(Comment::class);
}

}
 