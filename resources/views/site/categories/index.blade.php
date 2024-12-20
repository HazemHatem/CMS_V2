@extends('site.app')

@section('title' , 'Categories')

@push('custom-css')
<link rel="stylesheet" href="{{ asset('site/Style/css/category/index.css') }}">
@endpush

@section('content')
<section class="LandingPage col-12">
    <section class="landing col-12">
        <div class="col-6">
            <span class="title">
                <h1>Categories</h1>
            </span>
        </div>
    </section>
</section>
<main class="container col-10">
    <section class="contetn col-12">
        <div class="gallery-container">
            @foreach ($categories as $category )
            <div class="gallery-item">
                <a href="{{route('category.article', $category->id)}}">
                    <div class="image-overlay">
                        <h3 class="title">{{$category->name}}</h3>
                    </div>
                    <img src="{{FileHelper::categoryimage($category->image) }}" class="card-img-top" alt="...">
                </a>
            </div>
            @endforeach
        </div>
        @include('site.layout.pagination.pagination', ['data' => $categories])
    </section>
</main>
@endsection