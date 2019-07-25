<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App
 */

class Profile extends Model
{
    protected $guarded = [];


    public function user() {
        $this->belongsTo( User::class );
    }
}
