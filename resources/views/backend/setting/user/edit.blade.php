@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            @if (session('failed'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-exclamation-triangle"></i><b> Failed!</b></h6>
                    {{ session('failed') }}
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Name<sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('name')
                            is-invalid
                        @enderror"
                                name="name" id="name" value="{{ old('name', $user->name) }}"
                                placeholder="Enter name ex: Budi" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="email">Email<sup class="text-danger">*</sup></label>
                            <input type="email"
                                class="form-control form-control-sm @error('email')
                            is-invalid
                        @enderror"
                                name="email" id="email" value="{{ old('email', $user->email) }}"
                                placeholder="Enter email" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password">Password<sup class="text-danger">*</sup></label>
                            <input type="password"
                                class="form-control form-control-sm @error('password')
                            is-invalid
                        @enderror"
                                name="password" id="passwordInput" placeholder="Enter password" required>
                            <span id="togglePassword" class="toggle-password text-bg-dark"><i class="fa fa-eye"></i></span>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="password-confirm">Confirm Password<sup class="text-danger">*</sup></label>
                            <input type="password" name="password_confirmation" class="form-control form-control-sm"
                                id="passwordConfirm" placeholder="Enter password" required>
                            <span id="togglePasswordConfirm" class="toggle-password text-bg-dark"><i
                                    class="fa fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('user.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style type="text/css">
        #showHidePassword {
            position: relative;
        }

        #togglePassword,
        #togglePasswordConfirm {
            position: absolute;
            top: 75%;
            right: 20px;
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

            $('#togglePasswordConfirm i').click(function(event) {
                event.preventDefault();
                const passwordConfirmInput = $('#passwordConfirm');
                const toggleConfirmPassword = $('#togglePasswordConfirm i');

                if (passwordConfirmInput.attr('type') === 'text') {
                    passwordConfirmInput.attr('type', 'password');
                    toggleConfirmPassword.removeClass('fa-eye-slash').addClass('fa-eye');
                } else if (passwordConfirmInput.attr('type') === 'password') {
                    passwordConfirmInput.attr('type', 'text');
                    toggleConfirmPassword.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
@endsection
