@extends('admin.app')

@section('title' , 'Authors')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Authors</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.author.index')])
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->email }}</td>
                                    <td>{{ Str::words($author->description, 5) }}</td>
                                    <td>
                                        @include('Admin.layout.actions.show' , ['route' => 'Admin.author.show' , 'id' => $author->id])
                                        @include('Admin.layout.actions.edit' , ['route' => 'Admin.author.edit' , 'id' => $author->id])
                                        @include('Admin.layout.actions.delete' , ['route' => 'Admin.author.destroy' , 'id' => $author->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $authors])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush
