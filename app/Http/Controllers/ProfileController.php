<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request  ): RedirectResponse
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if($request->hasFile('avatar')){
            $user->clearMediaCollection();
            $user->addMediaFromRequest("avatar")
            ->usingName($request->name)
            ->toMediaCollection('user.avatar');
        }

       

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function page($id){
        $user = User::findOrFail($id);
        $posts = $user->posts()->orderBy('created_at', 'DESC')
        ->get();
        return view('page',get_defined_vars());
    }

    
    public function home(){
        $posts = Post::with('user')->orderBy('created_at', 'DESC')
        ->get();
        // return ($posts);
        return view('home',get_defined_vars());
    }
}
