@extends('site.app')

@section('title' , 'Contact Us')

@push('contact-css')
<link rel="stylesheet" href="{{ asset('site/style/css/contact/index.css') }}">
@endpush

@section('content')




<section class="LandingPage col-12">
    <!-- start landing -->
    <section class="landing col-12">


        <div class="col-6">
            <span class="title">
                <h1>Let's Connect
                </h1>
            </span>

        </div>
    </section>
</section>


<!-- End landing -->

<main class="container col-12">
    <div class="recent col-12">

        <div class="container col-12">
            <div class="row  col-12">
                <div class="title2">

                </div>


                <div class="col-12   row-2s">
                    <div class="right col-12">
                        <div class="top">
                            <h4>Connect with Us</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.
                            </p>

                        </div>
                        <div class="button">
                            <a href="https://x.com/" target="_blank"><i class="fa-brands fa-twitter"></i> Follow us on Twitter</a>
                            <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i>Like us on facebook</a>
                            <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i>Follow us on instagram</a>

                        </div>
                    </div>
                    <div class="left col-12">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-groupe">
                                <h3 class="col-12">Send a Request</h3>
                                <div class="col-12">
                                    @include('site.layout.forms.input', ['name' => 'name' , 'type' => 'text' , 'value' => old('name')])
                                </div>
                                <div class="col-12">
                                    @include('site.layout.forms.input', ['name' => 'email' , 'type' => 'email' , 'value' => old('email')])
                                </div>
                                <div class="col-12">
                                    @include('site.layout.forms.input', ['name' => 'phone' , 'type' => 'text' , 'value' => old('phone')])
                                </div>
                                <div class="col-12">
                                    @include('site.layout.forms.input', ['name' => 'subject' , 'type' => 'text' , 'value' => old('subject')])
                                </div>
                                <div class="col-12">
                                    @include('site.layout.forms.message', ['name' => 'message' , 'value' => old('message')])
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success" id="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>




        </div>
    </div>
</main>
@endsection


@push('scripts')
@include('site.layout.message.success')
@endpush