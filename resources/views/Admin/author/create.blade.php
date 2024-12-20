@extends('Admin.app')

@section('title' , 'Add Author')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Author</h3>
                    </div>
                    <form action="{{ route('Admin.author.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'name', 'type' => 'text', 'value' => old('name')])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'email', 'type' => 'email', 'value' => old('email')])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'phone', 'type' => 'text', 'value' => old('phone')])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'password', 'type' => 'password', 'value' => old('password')])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'description', 'type' => 'text', 'value' => old('description')])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.image')
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
