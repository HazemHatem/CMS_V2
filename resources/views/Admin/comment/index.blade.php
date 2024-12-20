@extends('admin.app')

@section('title' , 'Comments')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Comments</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.comment.index')])
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Article</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td><a href="{{route('Admin.article.show', $comment->article->id)}}">{{ $comment->article->title }}</a></td>
                                    <td>{{ Str::words($comment->content, 5) }}</td>
                                    <td>
                                        @include('Admin.layout.actions.show' , ['route' => 'Admin.comment.show' , 'id' => $comment->id])
                                        @include('Admin.layout.actions.edit' , ['route' => 'Admin.comment.edit' , 'id' => $comment->id])
                                        @include('Admin.layout.actions.delete' , ['route' => 'Admin.comment.destroy' , 'id' => $comment->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $comments])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush
