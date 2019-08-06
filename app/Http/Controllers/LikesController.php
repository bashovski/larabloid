<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Submission;

class LikesController extends Controller
{

    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function store( Submission $submission ) {
        return auth()->user()->likes()->toggle( $submission );
    }
}
