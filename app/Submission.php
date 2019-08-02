<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Submission extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo( User::class );
    }
    public function bindTimeToSubtract( $sub ) {
        $rval = '';
        if( $sub < 60 ) $rval = $sub.' seconds ago';
        else if( $sub >= 60 && $sub < 3600 ) $rval = intval($sub/60). ' minutes ago';
        else if( $sub >= 3600 && $sub < ( 86400 ) ) $rval = intval( $sub / 3600 ).' hours ago';
        else if( $sub >= 86400 && $sub < ( 86400 * 2 ) ) $rval = 'a day ago';
        else if( $sub >= (86400*2) && $sub < ( 86400 * 7 ) ) $rval = intval( $sub / 86400 ).' days ago';
        else if( $sub >= ( 86400 * 7 ) && $sub < ( 86400 * 7 * 2 ) ) $rval = 'a week ago';
        else if( $sub >= ( 86400 * 7 * 2 ) && $sub < ( 86400 * 31 ) ) $rval = intval( $sub / 86400 / 7 ).' weeks ago';
        else if( $sub >= ( 86400 * 31 )  && $sub < ( 86400 * 62 )  ) $rval = 'a month ago';
        else if( $sub >= ( 86400 * 31 ) && $sub < ( 86400 * 365 ) ) $rval = intval( $sub / ( 86400 * 31 ) ) . ' months ago';
        else if( $sub < ( 86400 * 365 * 2 ) ) $rval = 'a year ago';
        else $rval = intval( $sub / ( 86400 * 365 ) ). ' years ago';
        return ($rval);
    }
    public function getSubmitDateSubtracted() {
        $since = ( intval( '' . Carbon::now()->timestamp ) - intval( '' . $this->created_at->timestamp ) );
        return $this->bindTimeToSubtract( $since );
    }
}
