@extends('admin.app')

@section('title' , 'Settings')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Settings</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.setting.index')])
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>key</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($settings as $setting)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $setting->key }}</td>
                                    <td>{{ $setting->value }}</td>
                                    <td>
                                        @include('Admin.layout.actions.show' , ['route' => 'Admin.setting.show' , 'id' => $setting->id])
                                        @include('Admin.layout.actions.edit' , ['route' => 'Admin.setting.edit' , 'id' => $setting->id])
                                        @include('Admin.layout.actions.delete' , ['route' => 'Admin.setting.destroy' , 'id' => $setting->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $settings])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush