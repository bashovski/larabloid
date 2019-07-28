<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class ProfilesController
 * @package App\Http\Controllers
 */

class ProfilesController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index( User $user ) {
        return view( 'home', compact( 'user') );
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( User $user ) {

        $this->authorize( 'update', $user->profile );
        return view( 'edit', compact( 'user' ) );
    }


    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update( User $user ) {

        /**
         *  Double validation for user and profile data separately
         *  in order to update both profile and user immediately
         */

        $this->authorize( 'update', $user->profile );

        $data = request()->validate([

            'biography' => "required",
            'location' => "required",
            'avatar' => [ "image", "max:5120" ]
        ]);

        $user_data = request()->validate([

            'email' => ['sometimes', 'nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed']

        ]);

        // hash
        $user_data[ 'password' ] = Hash::make( $user_data['password'] );

        /*
         *  Removing either email or password or both if they are not renewed
         *  (second validation)
         */
        if( $user_data[ 'email' ] == null )
            unset( $user_data[ 'email' ] );

        if( $user_data[ 'password' ] == null )
            unset( $user_data[ 'password' ] );

        if( !empty( $user_data ) )
            auth()->user()->update( $user_data );

        /*
         *  removing avatar if not chosen by the user
         */

        $avatarPath = auth()->user()->profile->avatar;
        if( request( 'avatar' ) ) {
            $avatarPath = request( 'avatar' )->store( 'profile', 'public' );
        }

        auth()->user()->profile->update( array_merge(
            $data,
            [ 'avatar' => $avatarPath ]
        ) );

        return redirect( "/profile/{$user->id}" );
    }
}
