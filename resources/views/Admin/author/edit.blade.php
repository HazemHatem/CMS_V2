@extends('Admin.app')

@section('title' , $author->name)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Author</h3>
                    </div>
                    <form action="{{ route('Admin.author.update', $author->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'name' , 'type' => 'text' , 'value' => $author->name])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'email' , 'type' => 'email' , 'value' => $author->email])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'phone' , 'type' => 'text' , 'value' => $author->phone])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.message', ['name' => 'description' , 'value' => $author->description])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.image')
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.rule', ['value' => $author->rule_id])
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
