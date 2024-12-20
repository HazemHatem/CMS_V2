@extends('admin.app')

@section('title' , 'Wishlist')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Articles</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wishlist as $article)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route('Admin.user.show', $article->user->id)}}">{{ $article->user->name }}</a></td>
                                    <td><a href="{{route('Admin.article.show', $article->article->id)}}">{{ $article->article->title }}</a></td>
                                    <td><a href="{{route('Admin.author.show', $article->article->author->id)}}">{{ $article->article->author->name }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $wishlist])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection