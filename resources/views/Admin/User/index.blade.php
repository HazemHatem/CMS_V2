@extends('Admin.app')

@section('title' , 'Users')

@section('content')
<section class="content">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                    @include('Admin.layout.forms.search', ['url' => route('Admin.user.index')])
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? '-' }}</td>
                                <td>
                                    @include('Admin.layout.actions.show', ['route' => 'Admin.user.show', 'id' => $user->id])
                                    @include('Admin.layout.actions.edit', ['route' => 'Admin.user.edit', 'id' => $user->id])
                                    @include('Admin.layout.actions.delete', ['route' => 'Admin.user.destroy', 'id' => $user->id])
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @include('Admin.layout.pagination.pagination' , ['data' => $users])
            </div>
        </div>
    </div>
</section>
@endsection

@push('before-scripts')
@include('Admin.layout.message.success')
@endpush
