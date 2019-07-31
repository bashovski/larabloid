<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class SubmissionsController extends Controller
{
    public function create() {

        return view( 'submissions.create' );
    }
    public function store() {

        $data = request()->validate([
            'title' => [ 'required', 'max:255' ],
            'category' => [ 'required', Rule::in( [ 'Politics', 'Economy', 'Health', 'Tech', 'Sports', 'Lifestyle' ] ) ],
            'image' => [ 'required', 'image', 'max:5120' ],
            'caption' => [ 'required', 'max:128' ],
            'content' => 'required',
        ]);
        dd( request()->all() );
        Auth::user()->update( $data );
    }
}
