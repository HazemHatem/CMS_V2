@extends('site.author.app')

@section('title', 'Post')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Articles</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Author.post.index')])
                    </div>
                    @if ( $articles->isEmpty() )
                    <span class="text-center alert alert-danger" style="width: 100%;font-size: 20px">No articles found.</span>
                    @else
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
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
                                            <li>{{ $category->name }}</li>
                                        </ul>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($article->status == 'published')
                                        @include('Admin.layout.actions.show' , ['route' => 'article.show' , 'id' => $article->id])
                                        @endif
                                        @include('Admin.layout.actions.edit' , ['route' => 'Author.post.edit' , 'id' => $article->id])
                                        @include('Admin.layout.actions.delete' , ['route' => 'Author.post.destroy' , 'id' => $article->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $articles])
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush