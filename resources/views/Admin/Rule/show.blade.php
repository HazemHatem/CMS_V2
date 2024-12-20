@extends('Admin.app')

@section('title' , $rule->name)

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rule Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Name</th>
                                    <td>{!! $rule->rule() !!}</td>
                                </tr>
                                <tr>
                                    <th>Users</th>
                                    <td>
                                        <ul class="list-group">
                                            @foreach ($users as $user)
                                            <li class="list-group-item"><a href="{{route('Admin.user.show', $user->id)}}">{{ $user->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $rule->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $rule->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex">
                        @include('Admin.layout.actions.back' , ['route' => 'Admin.rule.index'])
                        <div class="ml-auto">
                            @include('Admin.layout.actions.delete', ['route' => 'Admin.rule.destroy' , 'id' => $rule->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection