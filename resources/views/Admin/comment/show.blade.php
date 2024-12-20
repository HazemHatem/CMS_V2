@extends('Admin.app')

@section('title' , 'Comment Details')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Comment Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Name</th>
                                    <td>{{ $comment->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Article</th>
                                    <td>
                                        <a href="{{route('Admin.article.show', $comment->article->id)}}">{{$comment->article->title}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Content</th>
                                    <td>{{ $comment->content }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $comment->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $comment->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex">
                        @include('Admin.layout.actions.back', ['route' => 'Admin.comment.index'])
                        <div class="ml-auto">
                            @include('Admin.layout.actions.delete', ['route' => 'Admin.comment.destroy', 'id' => $comment->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection