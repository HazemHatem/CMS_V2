@extends('site.app')

@section('title' , $article->title)


@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/post/index.css') }}">
<link rel="stylesheet" href="{{ asset('site/Style/css/comment/index.css') }}">
@endpush

@section('content')
<section class="LandingPage col-12">
    <!-- start landing -->
    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>{{ $article->title }}</h1>
            </span>
        </div>
    </section>
</section>



<main class="container col-11">
    <div class="recent col-11">
        <div class="container col-12">
            <div class="row  col-12">
                <div class="title2">
                    <h1 class="col-12">{{ $article->title }}</h1>
                    <p> {{date('F j, Y', strtotime($article->created_at))}} |
                        @foreach ($article->categories as $category)
                        <a href="{{route('category.article', $category->id)}}">{{$category->name}} </a>
                        @endforeach
                    </p>
                    <div class="text-center mb-2">
                        <div class="mb-2 d-flex">
                            @include('site.layout.Rating.rating', ['article'=>$article])
                            @include('site.layout.forms.wishlist', ['Post' => $article])
                        </div>
                        <form action="{{ route('articles.rate', $article->id) }}" class="rate-article" method="POST">
                            @csrf
                            <h5 class="mt-1">Your rating of the article:</h5>
                            <button type="submit" class="bg-light d-inline ms-2">
                                @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rating" id="star-{{ $i }}" value="{{ $i }}"
                                    @if ($userRating && $userRating->rating == $i) checked @endif>
                                <label for="star-{{ $i }}" class="fa fa-star"></label>
                                @endfor
                            </button>
                        </form>
                    </div>
                    <div>
                        @include('site.layout.forms.like', ['icon' => 'fas fa-thumbs-up', 'type' => 'like'])
                        @include('site.layout.forms.like', ['icon' => 'fas fa-thumbs-down', 'type' => 'dislike'])
                    </div>
                </div>
                <div class="col-10   row-2s">
                    <div class="paragraph">
                        <p>{!! $article->content !!}</p>
                    </div>
                    <div class="author">
                        <div class="cont_author col-lg-12">
                            <div class="authorImg">
                                <img src="{{ FileHelper::userimage($article->author->image) }}" alt="">
                                <h6>{{ $article->author->name }}</h6>
                            </div>
                            <div class="paragraph_2">
                                <p>{{ $article->author->description }}</p>
                            </div>
                            <div class="links_author">
                                <a href="https://www.facebook.com">
                                    <i class="fa-brands fa-facebook" style="font-size: 24px;"></i>
                                </a>
                                <a href="https://www.instagram.com">
                                    <i class="fa-brands fa-twitter" style="font-size: 24px;"></i>
                                </a>
                                <a href="https://www.linkedin.com">
                                    <i class="fa-brands fa-linkedin" style="font-size: 24px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="comments-section">
        <h3>Comments</h3>
        <div id="comments-list">
            @foreach ($article->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->content }}</p>
            </div>
            @endforeach
        </div>
        <h4>Add a Comment</h4>
        <form id="comment-form" action="{{ route('comment.store') }}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            @include('site.layout.forms.message', ['name' => 'content', 'value' => old('content')])
            <button type="submit">Submit</button>
        </form>
    </div>
</main>
@endsection


@push('scripts')
@include('site.layout.message.success')
@endpush