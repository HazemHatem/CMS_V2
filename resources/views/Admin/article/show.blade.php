@extends('Admin.app')

@section('title' , $article->title)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Article Details</h3>
                    </div>
                    <div class="card-header">
                        <div class="image float-right">
                            <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::userimage($article->image) }}" alt="{{ $article->name }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Title</th>
                                    <td>{{ $article->title }}</td>
                                </tr>
                                <tr>
                                    <th>Rating</th>
                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=floor($article->averageRating()))
                                            <i class="fa fa-star" style="color: gold;"></i>
                                            @elseif ($i - $article->averageRating() < 1)
                                                <i class="fa fa-star-half-alt" style="color: gold;"></i>
                                                @else
                                                <i class="fa fa-star" style="color: black;"></i>
                                                @endif
                                                @endfor
                                    </td>
                                </tr>
                                <tr>
                                    <th>Likes</th>
                                    <td>{{ $article->countlikes() }}</td>
                                </tr>
                                <tr>
                                    <th>Dislikes</th>
                                    <td>{{ $article->countdislikes() }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>
                                        @foreach ($article->categories as $category)
                                        <ul>
                                            <li><a href="{{route('Admin.category.show', $category->id)}}">{{$category->name}}</a></li>
                                        </ul>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Author</th>
                                    <td><a href="{{route('Admin.author.show', $article->author->id)}}">{{ $article->author->name }}</a></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{!! $article->status() !!}</td>
                                </tr>
                                <tr>
                                    <th>Views</th>
                                    <td>{{ $article->countviews() }}</td>
                                </tr>
                                <tr>
                                    <th>Content</th>
                                    <td>{!! $article->content !!}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $article->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $article->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex">
                        @include('Admin.layout.actions.back', ['route' => 'Admin.article.index'])
                        <div class="ml-auto">
                            @include('Admin.layout.actions.edit', ['route' => 'Admin.article.edit', 'id' => $article->id])
                        </div>
                        <div class="ml-auto">
                            @include('Admin.layout.actions.delete', ['route' => 'Admin.article.destroy', 'id' => $article->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection
