<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = ['name', 'habit_id', 'user_id'];

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
