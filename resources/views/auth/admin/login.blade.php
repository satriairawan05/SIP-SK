@extends('auth.layout.app')

@section('auth')
    <div class="card my-5 shadow-sm">
        <div class="card-body p-0">
            @if (session('loginError'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-exclamation-triangle"></i><b> Failed!</b></h6>
                    {{ session('loginError') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-form">
                        <div class="text-center">
                            <h1 class="h4 mb-4 text-gray-900">{{ $name }}</h1>
                        </div>
                        <form action="{{ route('user.login_store') }}" method="post" class="user">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email"
                                    class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                    id="email" placeholder="Enter Email Address">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember
                                        Me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <p class="font-weight-bold small">© 2023 -{{ Date('Y') }} All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        // Mengatur header default untuk setiap permintaan AJAX dengan token CSRF
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        });

        // Contoh permintaan AJAX
        $.ajax({
            url: '/admin/login',
            type: 'POST',
            data: {
                // Data yang ingin Anda kirim
                _token: csrfToken
            },
            success: function(response) {
                // Tanggapan dari permintaan AJAX berhasil
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            },
            error: function(xhr, status, error) {
                // Penanganan kesalahan permintaan AJAX
            }
        });
    </script>
@endsection
