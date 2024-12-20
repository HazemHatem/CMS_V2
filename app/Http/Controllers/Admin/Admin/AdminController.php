<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Http\Requests\Admin\Admin\AdminRequest;
use App\Models\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admins = User::latest('updated_at')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->whereIn('rule_id', [3, 4])
            ->paginate(12)
            ->appends($request->all());

        return view('Admin.Admin.index', compact('admins'));
    }

    public function create()
    {
        return view('Admin.Admin.create');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['rule_id'] = $data['rule_id'] ?? 3;

        User::create($data);

        return redirect()->route('Admin.admin.index')->with('success', 'Admin created successfully');
    }

    public function show(User $admin)
    {
        return view('Admin.Admin.show', compact('admin'));
    }

    public function edit(User $admin)
    {
        $rules = Rule::all();

        return view('Admin.Admin.edit', compact('admin', 'rules'));
    }

    public function update(AdminRequest $request, User $admin)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            FileHelper::deleteimage($admin->image);
            $data['image'] = $request->file('image')->store('admins/', 'public');
        }
        $admin->update($data);

        return redirect()->route('Admin.admin.index')->with('success', 'Admin updated successfully');
    }

    public function destroy(User $admin)
    {
        FileHelper::deleteimage($admin->image);
        $admin->delete();
        return redirect()->route('Admin.admin.index')->with('success', 'Admin deleted successfully');
    }
}
