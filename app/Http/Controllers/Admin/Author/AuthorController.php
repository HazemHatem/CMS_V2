<?php

namespace App\Http\Controllers\Admin\Author;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Author\AuthorRequest;
use App\Http\Requests\Admin\Author\AuthorUpdateRequest;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = User::latest('updated_at')
            ->where('rule_id', 2)
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(12)
            ->appends($request->all());
        return view('Admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $data = $request->validated();
        $data['rule_id'] = 2;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('authors/', 'public');
        }
        User::create($data);
        return redirect()->route('Admin.author.index')->with('success', 'Author created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $author)
    {
        return view('Admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $author)
    {
        $rules = Rule::all();
        return view('Admin.author.edit', compact('author', 'rules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorUpdateRequest $request, User $author)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            FileHelper::deleteimage($author->image);
            $data['image'] = $request->file('image')->store('authors/', 'public');
        }
        $author->update($data);
        return redirect()->route('Admin.author.index')->with('success', 'Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $author)
    {
        FileHelper::deleteimage($author->image);
        $author->delete();
        return redirect()->route('Admin.author.index')->with('success', 'Author deleted successfully');
    }
}
