@extends('site.app')

@section('title' , 'Articles')
<!-- End landing -->

@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/category/index.css') }}">
@endpush

@section('content')
<section class="LandingPage col-12">
    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>Articles</h1>
            </span>
        </div>
    </section>
</section>
<main class="container col-10">
    <section class="contetn col-12">
        <div class="col-12   row-2s">
            @if ($articles->isEmpty())
            <span class="text-center alert alert-danger" style="width: 100%;font-size: 20px">No articles found.</span>
            @else
            @foreach ($articles as $Post)
            <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="card h-100">
                    <a href="{{route('article.show', $Post->id)}}">
                        <div class="image-container">
                            <img src="{{FileHelper::articleimage($Post->image)}}" class="card-img-top"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <div class="mb-2 d-flex">
                                @include('site.layout.Rating.rating', ['article'=>$Post])
                                @include('site.layout.forms.wishlist', ['Post' => $Post])
                            </div>
                            <h5 class="card-title">{{$Post->title}}</h5>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="img_name col-6">
                            <img src="{{FileHelper::authorimage($Post->author->image)}}" class="card-img-top" alt="...">
                            <p>{{$Post->author->name}}</p>
                        </div>
                        <span class="date">
                            <p>{{$Post->created_at}}</p>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @include('site.layout.pagination.pagination', ['data' => $articles])
    </section>
</main>
@endsection


@push('scripts')
@include('site.layout.message.success')
@endpush