<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\changePasswordRequest;
use App\Http\Requests\Admin\Profile\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{

    /**
     * Show the form for editing the profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Admin.Profile.index');
    }


    /**
     * Update the specified user's profile.
     *
     * @param \App\Http\Requests\Admin\User\UserRequest $request The request containing the new profile information.
     * @param \App\Models\User $user The user whose profile is to be updated.
     * @return \Illuminate\Http\RedirectResponse A redirect response back to the previous page with a success message.
     */
    public function update(ProfileRequest $request, User $profile)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            FileHelper::deleteimage($profile->image);
            $data['image'] = $request->file('image')->store('users/', 'public');
        }
        $profile->update($data);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    /**
     * Change the password for the specified user.
     *
     * @param \App\Http\Requests\Admin\changePasswordRequest $request The request containing the new password.
     * @param \App\Models\User $user The user whose password is to be changed.
     * @return \Illuminate\Http\RedirectResponse A redirect response back to the previous page with a success message.
     */
    public function changePassword(changePasswordRequest $request, User $profile)
    {
        $profile->update(['password' => Hash::make($request->validated('password'))]);
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
