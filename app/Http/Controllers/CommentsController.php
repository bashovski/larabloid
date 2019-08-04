<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Submission;

class CommentsController extends Controller
{
    public function index( Submission $submission ) {
        $submissions = Submission::with('comments')->get()->find( $submission );
        return dd( $submissions['comments'] );
    }
    public function create() {

    }
    public function store( Submission $submission ) {

        $data = request()->validate([
           'text' => [ 'required', 'string', 'max:255' ],
        ]);

        $data[ 'user_id' ] = auth()->user()->id;
        $id = $submission->comments()->create( $data );
        return redirect( '/submissions/'.$submission->id );

    }
}
