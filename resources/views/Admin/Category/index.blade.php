@extends('admin.app')

@section('title' , 'Categories')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categories</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.category.index')])
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ Str::words($category->description, 7) }}</td>
                                    <td>
                                        @include('Admin.layout.actions.show' , ['route' => 'Admin.category.show' , 'id' => $category->id])
                                        @include('Admin.layout.actions.edit' , ['route' => 'Admin.category.edit' , 'id' => $category->id])
                                        @include('Admin.layout.actions.delete' , ['route' => 'Admin.category.destroy' , 'id' => $category->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $categories])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush
