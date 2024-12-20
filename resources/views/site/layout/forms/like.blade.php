<form action="{{ route('articles.toggle-like', $article->id) }}" class="ms-2 d-inline" method="POST">
    @csrf
    <input type="hidden" name="type" value="{{ $type }}">
    <button type="submit" class="{{ $type }}-button bg-light" style="font-size: 25px">
        <i class="{{ $icon }} @auth @if ($article->likes()->where('user_id', auth()->user()->id)->where('type', $type)->exists()) text-danger @endif @endauth"></i>
    </button>
    ({{ $article->likes->where('type', $type)->count() }})
</form>