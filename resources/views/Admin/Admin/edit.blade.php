@extends('admin.app')

@section('title' , 'Edit Admin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <form action="{{ route('Admin.admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">

                        <div class="form-group">
                            @include('Admin.layout.forms.input', ['name' => 'name', 'type' => 'text', 'value' => $admin->name])
                        </div>

                        <div class="form-group">
                            @include('Admin.layout.forms.input', ['name' => 'email', 'type' => 'email', 'value' => $admin->email])
                        </div>

                        <div class="form-group">
                            @include('Admin.layout.forms.input', ['name' => 'phone', 'type' => 'text', 'value' => $admin->phone])
                        </div>

                        <div class="form-group">
                            @include('Admin.layout.forms.message', ['name' => 'description', 'value' => $admin->description])
                        </div>

                        <div class="form-group">
                            @include('Admin.layout.forms.image')
                        </div>

                        <div class="form-group">
                            @include('Admin.layout.forms.rule', ['value' => $admin->rule_id])
                        </div>
                    </div>
                    <div class="box-footer mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endSection
