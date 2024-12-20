<label for="{{ $name }}">{{ ucwords($name) }}</label>
@include('web.site.layout.message.error', ['name' => $name])
<div class="input-wrapper">
    <input type="password" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" placeholder="Enter {{ ucwords($name) }}">
    <div class="input-group-append">
        <button class="toggle-password btn btn-outline-warning" type="button" onclick="{{ $onclick }}">
            <i class="fas fa-eye" id="togglecurrentIcon"></i>
        </button>
    </div>
</div>
