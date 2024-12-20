@extends('admin.app')

@section('title' , 'Articles')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Articles</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.article.index')])
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>
                                        @foreach ($article->categories as $category)
                                        <ul>
                                            <li><a href="{{route('Admin.category.show', $category->id)}}">{{ $category->name }}</a></li>
                                        </ul>
                                        @endforeach
                                    </td>
                                    <td><a href="{{route('Admin.author.show', $article->author->id)}}">{{ $article->author->name }}</a></td>
                                    <td>{!! $article->status() !!}</td>
                                    <td>
                                        @include('Admin.layout.actions.show' , ['route' => 'Admin.article.show' , 'id' => $article->id])
                                        @include('Admin.layout.actions.edit' , ['route' => 'Admin.article.edit' , 'id' => $article->id])
                                        @include('Admin.layout.actions.delete' , ['route' => 'Admin.article.destroy' , 'id' => $article->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $articles])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush