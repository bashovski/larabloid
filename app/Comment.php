<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 'commentable_id', 'commentable_type', 'text', 'user_id' ];

    public function commentable() {
        return morphTo();
    }
}
