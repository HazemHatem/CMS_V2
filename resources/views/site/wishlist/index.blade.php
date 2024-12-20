@extends('site.app')

@section('title' , 'Wishlist')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/category/index.css') }}">
@endpush

@section('content')
<section class="LandingPage col-12">
    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>Wishlist</h1>
            </span>
        </div>
    </section>
</section>
<main class="container col-10">
    <section class="contetn col-12">
        <div class="col-12   row-2s">
            @if ($wishlist->isEmpty())
            <span class="text-center alert alert-danger" style="width: 100%;font-size: 20px">No articles found.</span>
            @else
            @foreach ($wishlist as $article)
            <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="card h-100">
                    <a href="{{route('article.show', $article->article->id)}}">
                        <div class="image-container">
                            <img src="{{FileHelper::articleimage($article->article->image)}}" class="card-img-top"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <div class="mb-2 d-flex">
                                @include('site.layout.Rating.rating', ['article'=>$article->article])
                                <form action="{{route('wishlist.destroy', $article->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-light" style="margin-left: 190px;"><i class="fa-solid fa-bookmark"></i></button>
                                </form>
                            </div>
                            <h5 class="card-title">{{$article->article->title}}</h5>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="img_name col-6">
                            <img src="{{FileHelper::authorimage($article->article->author->image)}}" class="card-img-top" alt="{{ $article->article->author->name }}">
                            <p>{{$article->article->author->name}}</p>
                        </div>
                        <span class="date">
                            <p>{{$article->article->created_at}}</p>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @include('site.layout.pagination.pagination', ['data' => $wishlist])
    </section>
</main>
@endsection



@push('scripts')
@include('site.layout.message.success')
@endpush