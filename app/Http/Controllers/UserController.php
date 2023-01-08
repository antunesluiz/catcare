<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileFormRequest;
use Exception;
use Illuminate\Auth\Events\Registered;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return Inertia::render('User/edit');
    }

    /**
     * Update user data.
     *
     * @param UpdateUserProfileFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserProfileFormRequest $request)
    {
        try {
            $user = auth()->user();

            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->password) {
                $user->password = bcrypt($request->password);
            }

            $user->save();
        } catch (Exception $exception) {
            return Inertia::render('User/edit', [
                'errors' => ['Perfil salvo sem sucesso!']
            ]);
        }

        return redirect()->route('user.edit');;
    }
}
