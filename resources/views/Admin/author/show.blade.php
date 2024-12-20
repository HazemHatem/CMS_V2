@extends('Admin.app')

@section('title' , $author->name)

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Author Details</h3>
                    </div>
                    <div class="card-header">
                        <div class="image float-right">
                            <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::userimage($author->image) }}" alt="{{ $author->name }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Name</th>
                                    <td>{{ $author->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $author->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $author->phone ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $author->description }}</td>
                                </tr>
                                <tr>
                                    <th>Articles</th>
                                    <td>
                                        <ul class="list-group">
                                            @foreach ($author->articles as $article)
                                            <li class="list-group-item"><a href="{{route('Admin.article.show', $article->id)}}">{{ $article->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $author->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $author->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex">
                        @include('Admin.layout.actions.back', ['route' => 'Admin.author.index'])
                        <div class="ml-auto">
                            @include('Admin.layout.actions.delete', ['route' => 'Admin.author.destroy', 'id' => $author->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection