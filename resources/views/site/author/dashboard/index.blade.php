@extends('site.author.app')

@section('title' , 'Profile')

@section('content')
<section class="content mt-5 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <div class="text-center m-2 p-2">
                                    <img class="profile-user-img img-fluid img-circle" src=" {{FileHelper::userimage(Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                                </div>
                                @include('Admin.layout.forms.image')
                            </div>
                            <div class="form-groupe">
                                <div class="col-12 mb-3">
                                    @include('site.layout.forms.input' , ['name' => 'name' , 'type' => 'text' , 'value' => Auth::user()->name])
                                </div>
                                <div class="col-12 mb-3">
                                    @include('site.layout.forms.input' , ['name' => 'email' , 'type' => 'email' , 'value' => Auth::user()->email])
                                </div>
                                <div class="col-12 mb-3">
                                    @include('site.layout.forms.input' , ['name' => 'phone' , 'type' => 'text' , 'value' => Auth::user()->phone])
                                </div>
                                <div class="col-12 mb-3">
                                    @include('site.layout.forms.message', ['name' => 'description', 'value' => Auth::user()->description])
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-success" id="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3">
                                @include('Admin.layout.forms.password', ['name' => 'current_password', 'label' => 'Current Password' , 'id' => 'togglecurrentIcon', 'onclick' => 'toggleCurrentPassword()'])
                            </div>
                            <div class="form-group mb-3">
                                @include('Admin.layout.forms.password', ['name' => 'password', 'label' => 'Password' , 'id' => 'toggleIcon', 'onclick' => 'togglePassword()'])
                            </div>
                            <div class="form-group mb-3">
                                @include('Admin.layout.forms.password', ['name' => 'password_confirmation', 'label' => 'Confirm Password' , 'id' => 'toggleConfirmationIcon', 'onclick' => 'togglePasswordConfirmation()'])
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-primary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection


@push('before-scripts')
@include('Admin.layout.message.success')
<script src="{{ asset('dashboard/js/showpassword.js') }}"></script>
@endpush