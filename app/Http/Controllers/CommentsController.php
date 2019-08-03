<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Submission;

class CommentsController extends Controller
{
    public function create() {

    }
    public function store( $submission ) {

        $data = request()->validate([
           'text' => [ 'required', 'string', 'max:255' ]
        ]);

        auth()->user()->comments()->create([
            $data,
            'commentable_id' => (string)( $submission ),
            'commentable_type' => '\App\Comment'
        ]);

        dd( $submission, $data );
    }
}
