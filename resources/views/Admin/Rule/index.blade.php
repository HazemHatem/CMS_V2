@extends('admin.app')

@section('title' , 'Rules')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Rules</h3>
                        @include('Admin.layout.forms.search', ['url' => route('Admin.rule.index')])
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rules as $rule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{!! $rule->rule() !!}</td>
                                    <td>
                                        @include('Admin.layout.actions.show' , ['route' => 'Admin.rule.show' , 'id' => $rule->id])
                                        @include('Admin.layout.actions.edit' , ['route' => 'Admin.rule.edit' , 'id' => $rule->id])
                                        @include('Admin.layout.actions.delete' , ['route' => 'Admin.rule.destroy' , 'id' => $rule->id])
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('Admin.layout.pagination.pagination' , ['data' => $rules])
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
@endpush