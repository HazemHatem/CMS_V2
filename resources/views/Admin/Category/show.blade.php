@extends('Admin.app')

@section('title' , $category->name)

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category Details</h3>
                    </div>
                    <div class="card-header">
                        <div class="image float-right">
                            <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::userimage($category->image) }}" alt="{{ $category->name }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Name</th>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $category->description }}</td>
                                </tr>
                                <tr>
                                    <th>Articles</th>
                                    <td>
                                        <ul class="list-group">
                                            @foreach ($category->articles as $article)
                                            <li class="list-group-item"><a href="{{route('Admin.article.show', $article->id)}}">{{$article->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $category->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $category->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex">
                        @include('Admin.layout.actions.back', ['route' => 'Admin.category.index'])
                        <div class="ml-auto">
                            @include('Admin.layout.actions.delete', ['route' => 'Admin.category.destroy', 'id' => $category->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection