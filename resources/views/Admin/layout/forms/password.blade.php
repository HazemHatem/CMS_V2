<label for="{{ $name }}">{{ $label }}</label>
<div class="input-group">
    <input type="password" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" placeholder="Enter {{ $label }}">
    <div class="input-group-append">
        <button class="btn btn-outline-warning" type="button" onclick="{{ $onclick }}">
            <i class="fas fa-eye" id="{{ $id }}"></i>
        </button>
    </div>
</div>
@include('Admin.layout.message.error', ['name' => '{{ $name }}'])
