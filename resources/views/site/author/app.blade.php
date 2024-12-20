@include('site.author.layout.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('site.author.layout.nav')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('site.author.layout.header')

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        @include('site.author.layout.footer')
    </div>
    <!-- ./wrapper -->

    @include('site.author.layout.scripts')
</body>

</html>