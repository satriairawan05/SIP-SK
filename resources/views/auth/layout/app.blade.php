@include('auth.partials.header')
<!-- Login Content -->
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-9">
            @yield('auth')
        </div>
    </div>
</div>
<!-- Login Content -->
@include('auth.partials.footer')
