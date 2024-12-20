@extends('Admin.app')

@section('title' , $setting->key)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Setting</h3>
                    </div>
                    <form action="{{ route('Admin.setting.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'key' , 'type' => 'text' , 'value' => $setting->key])
                            </div>
                            <div class="form-group">
                                @include('Admin.layout.forms.input', ['name' => 'value' , 'type' => 'text' , 'value' => $setting->value])
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
