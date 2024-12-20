@if (Auth::check())
@if ( !$Post->wishlists()->where('user_id', Auth::user()->id)->first() )
<form action="{{route('wishlist.store')}}" method="POST">
    @csrf
    <input type="hidden" name="article_id" value="{{$Post->id}}">
    <button type="submit" style="margin-left: 190px;background-color: transparent;"><i class="fa-regular fa-bookmark"></i></button>
</form>
@else
<form action="{{route('wishlist.destroy', $Post->wishlists()->where('user_id', Auth::user()->id)->first()->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-light" style="margin-left: 190px;"><i class="fa-solid fa-bookmark"></i></button>
</form>
@endif
@else
<form action="{{route('wishlist.store')}}" method="POST">
    @csrf
    <input type="hidden" name="article_id" value="{{$Post->id}}">
    <button type="submit" style="margin-left: 190px;background-color: transparent;"><i class="fa-regular fa-bookmark"></i></button>
</form>
@endif