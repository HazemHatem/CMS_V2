@extends('admin.app')

@section('title' , 'Dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $authors }}</h3>

                        <p>Authors</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-feather"></i>
                    </div>
                    <a href="{{ route('Admin.author.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $articles }}</h3>
                        <p>Articles</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <a href="{{ route('Admin.article.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users }}</h3>

                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('Admin.user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $messages }}</h3>

                        <p>Messages</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <a href="{{ route('Admin.contact') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">New Articles</h3>
                                <div class="card-tools">
                                    <a href="{{ route('Admin.article.index') }}" class="btn btn-primary">All Articles</a>
                                </div>
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
                                        @foreach($articles_new as $article)
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Popular Articles</h3>
                                <div class="card-tools">
                                    <a href="{{ route('Admin.article.index') }}" class="btn btn-primary">All Articles</a>
                                </div>
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
                                        @foreach($articles_popular as $article)
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection