<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    public function index( ) {
        return view( 'submit' );
    }
}
