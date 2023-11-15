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
                        <form action="{{ route('mahasiswa.login_store') }}" method="post" class="user">
                            @csrf
                            <div class="form-group">
                                <input type="text"
                                    class="form-control @error('nim')
                                    is-invalid
                                @enderror"
                                    id="nim" name="mhs_nim" placeholder="Enter Nim">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="passwordInput"
                                    placeholder="Password">
                                <span id="togglePassword" class="toggle-password text-bg-dark"><i
                                        class="fa fa-eye"></i></span>
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
                            <p class="font-weight-bold small">© 2023 - {{ Date('Y') }} All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('ruang-admin/css/ruang-admin.min.css') }}"></script>
    <script type="text/javascript">
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        // Mengatur header default untuk setiap permintaan AJAX dengan token CSRF
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        });

        $.ajax({
            url: '/login',
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

    <style type="text/css">
        #showHidePassword {
            position: relative;
        }

        #togglePassword,
        #togglePasswordConfirm {
            position: absolute;
            top: 44%;
            right: 70px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#togglePassword i').click(function(event) {
                event.preventDefault();
                const passwordInput = $('#passwordInput');
                const togglePassword = $('#togglePassword i');

                if (passwordInput.attr('type') === 'text') {
                    passwordInput.attr('type', 'password');
                    togglePassword.removeClass('fa-eye-slash').addClass('fa-eye');
                } else if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    togglePassword.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
@endsection
