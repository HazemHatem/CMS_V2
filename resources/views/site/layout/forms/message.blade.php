<label for="{{ $name }}">{{ ucwords($name) }}</label>
<textarea name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" rows="4" placeholder="Enter {{ ucwords($name) }}">{{ $value }}</textarea>
@include('site.layout.message.error', ['name' => $name])