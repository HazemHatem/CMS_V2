<label for="rule_id">Rule</label>
<select name="rule_id" class="form-control @error('rule_id') is-invalid @enderror" id="rule_id">
    @foreach ($rules as $rule)
    @if ($rule->name != 'manager' || Gate::forUser(Auth::guard('admin')->user())->check('manager'))
    <option value="{{ $rule->id }}" @selected($rule->id == $value)>{{ $rule->name }}</option>
    @endif
    @endforeach
</select>
@include('Admin.layout.message.error', ['name' => 'rule_id'])
