<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller
{
    public function index( User $user ) {
        return view( 'home', compact( 'user') );
    }
    public function edit( User $user ) {
        return view( 'edit', compact( 'user' ) );
    }
}
