@extends('Admin.app')

@section('title' , $setting->name)

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Setting Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Key</th>
                                    <td>{{ $setting->key }}</td>
                                </tr>
                                <tr>
                                    <th>Value</th>
                                    <td>{{ $setting->value }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $setting->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $setting->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex">
                        @include('Admin.layout.actions.back' , ['route' => 'Admin.setting.index'])
                        <div class="ml-auto">
                            @include('Admin.layout.actions.delete', ['route' => 'Admin.setting.destroy' , 'id' => $setting->id])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection