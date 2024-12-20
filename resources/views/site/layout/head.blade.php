<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }}| @yield('title')</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{asset('site/Style/css/libs/fontawesome/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('site/Style/css/libs/fontawesome/css/brands.css')}}" rel="stylesheet" />
    <link href="{{asset('site/Style/css/libs/fontawesome/css/solid.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('site/Style/css/libs/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <!-- <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    /> -->
    <link rel="stylesheet" href="{{asset('site/Style/css/libs/animate/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('site/Style/css/index.css')}}" />

    <link rel="stylesheet" href="{{asset('site/Style/css/home/style.css')}}" />
    @stack('custom-css')
    @stack('contact-css')







</head>

<body>