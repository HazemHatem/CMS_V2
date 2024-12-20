@extends('Admin.app')

@section('title' , $admin->name)

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Admin Details</h3>
                    </div>
                    <div class="card-header">
                        <div class="image float-right">
                            <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::userimage($admin->image) }}" alt="{{ $admin->name }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Name</th>
                                    <td>{{ $admin->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $admin->phone ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $admin->email }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $admin->description ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ $admin->rule->name }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $admin->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $admin->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex">
                        @include('Admin.layout.actions.back', ['route' => 'Admin.admin.index'])
                        <div class="ml-auto">
                            @include('Admin.layout.actions.delete', ['route' => 'Admin.admin.destroy', 'id' => $admin->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection
