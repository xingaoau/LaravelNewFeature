<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'target_id', 'target_type'];

    public function target()
    {
        return $this->morphTo();
    }
}
