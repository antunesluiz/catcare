<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateProfileFormRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display the profile view.
     *
     * @return \Inertia\Response
     */
    public function profile()
    {
        return Inertia::render('Profile');
    }

    /**
     * Update user data.
     *
     * @param UserUpdateProfileFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateProfileFormRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        event(new Registered($user));
        
        return redirect(RouteServiceProvider::HOME);
    }
}
