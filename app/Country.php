<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
    }
}
