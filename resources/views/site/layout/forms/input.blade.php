<label for="{{ $name }}">{{ ucwords($name) }}</label>
<input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" value="{{ $value }}" placeholder="Enter {{ ucwords($name) }}">
@include('site.layout.message.error', ['name' => $name])