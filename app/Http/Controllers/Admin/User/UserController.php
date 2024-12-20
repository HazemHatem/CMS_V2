<?php

namespace App\Http\Controllers\Admin\User;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\RegisterRequest;
use App\Models\User;
use App\Models\Rule;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\User\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $users = User::where('rule_id', 1)
            ->latest('updated_at')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(10)
            ->appends($request->all());
        return view('Admin.User.index', compact('users'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $rules = Rule::all();
        return view('Admin.User.edit', compact('user', 'rules'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \App\Http\Requests\Site\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            FileHelper::deleteimage($user->image);
            $data['image'] = $request->file('image')->store('users/', 'public');
        }
        $user->update($data);
        return redirect()->route('Admin.user.index')->with('success', 'User updated successfully');
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.User.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('Admin.user.index')->with('success', 'User created successfully');
    }

    /**
     * Show the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Admin.User.show', compact('user'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        FileHelper::deleteimage($user->image);
        $user->delete();
        return redirect()->route('Admin.user.index')->with('success', 'User deleted successfully');
    }
}
