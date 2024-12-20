@extends('Admin.app')

@section('title' , 'Add Setting')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Setting</h3>
                    </div>
                    <form action="{{ route('Admin.setting.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'key' , 'type' => 'text' , 'value' => old('key')])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'value' , 'type' => 'text' , 'value' => old('value')])
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