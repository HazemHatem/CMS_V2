@error('category_id')
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->get('category_id') as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@enderror