<?php

namespace App\Http\Controllers\Admin\Rule;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Rule\RuleRequest;
use App\Models\User;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rules = Rule::latest('updated_at')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(10)
            ->appends($request->all());
        return view('Admin.Rule.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Rule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleRequest $request)
    {
        Rule::create($request->validated());
        return redirect()->route('Admin.rule.index')->with('success', 'Rule created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        $users = User::where('rule_id', $rule->id)->get();
        return view('Admin.Rule.show', compact('rule', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rule $rule)
    {
        return view('Admin.Rule.edit', compact('rule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuleRequest $request, Rule $rule)
    {
        $rule->update($request->validated());
        return redirect()->route('Admin.rule.index')->with('success', 'Rule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        $rule->delete();
        return redirect()->route('Admin.rule.index')->with('success', 'Rule deleted successfully');
    }
}
