<?php

namespace App\Http\Controllers;

use App\User;

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
            #'avatar' => ""
        ]);

        $user_data = request()->validate([

            'email' => ['sometimes', 'nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed']

        ]);

        auth()->user()->profile->update( $data );

        return redirect( "/profile/{$user->id}" );
    }
}
