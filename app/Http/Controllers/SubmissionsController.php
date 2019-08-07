<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Submission;

class SubmissionsController extends Controller
{

    public function index() {

        $submissions = Submission::orderBy('created_at')->get();
        return view( 'home', compact( 'submissions' ) );
    }
    public function show( Submission $submission ) {
        $submission->increment( 'views' );
        $likes = ( auth()->user() ) ? ( auth()->user()->likes->contains( $submission ) ) : ( false );
        return view( 'submissions.show', compact('submission', 'likes' ) );
    }
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

        $data[ 'verified' ] = false;

        $data[ 'image' ] = request( 'image' )->store( 'submission', 'public' );
        $queryObj = auth()->user()->submissions()->create(
            $data
        );

        return redirect( '/submissions/'.$queryObj->id );
    }
}
