<div class="mb-2">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <=floor($article->averageRating()))
        <i class="fa fa-star" style="color: gold;"></i>
        @elseif ($i - $article->averageRating() < 1)
            <i class="fa fa-star-half-alt" style="color: gold;"></i>
            @else
            <i class="fa fa-star" style="color: black;"></i>
            @endif
            @endfor
</div>