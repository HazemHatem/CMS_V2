@extends('admin.app')

@section('title' , 'Edit User')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <form action="{{ route('Admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            @include('Admin.layout.forms.input', ['name' => 'name' , 'type' => 'text' , 'value' => $user->name])
                        </div>
                        <div class="form-group">
                            @include('Admin.layout.forms.input', ['name' => 'email' , 'type' => 'email' , 'value' => $user->email])
                        </div>
                        <div class="form-group">
                            @include('Admin.layout.forms.input', ['name' => 'phone' , 'type' => 'text' , 'value' => $user->phone])
                        </div>
                        <div class="form-group">
                            @include('Admin.layout.forms.message', ['name' => 'description' , 'value' => $user->description])
                        </div>
                        <div class="form-group">
                            @include('Admin.layout.forms.image')
                        </div>
                        <div class="form-group">
                            @include('Admin.layout.forms.rule', ['value' => $user->rule_id])
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endSection
