@extends('Admin.app')

@section('title' , 'Admins')

@section('content')
<section class="content">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Admins</h3>
                    @include('Admin.layout.forms.search', ['url' => route('Admin.admin.index')])
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Rule</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone ?? '-' }}</td>
                                <td>{{ $admin->rule->name }}</td>
                                <td>
                                    @include('Admin.layout.actions.show' , ['route' => 'Admin.admin.show' , 'id' => $admin->id])
                                    @include('Admin.layout.actions.edit' , ['route' => 'Admin.admin.edit' , 'id' => $admin->id])
                                    @include('Admin.layout.actions.delete' , ['route' => 'Admin.admin.destroy' , 'id' => $admin->id])
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('Admin.layout.pagination.pagination' , ['data' => $admins])
            </div>
        </div>
    </div>
</section>
@endsection

@push('before-scripts')
@include('Admin.layout.message.success')
@endpush
