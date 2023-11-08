@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Name<sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('name')
                            is-invalid
                        @enderror"
                                name="name" id="name" value="{{ old('name') }}" placeholder="Enter name ex: Budi"
                                required>
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
                                name="email" id="email" value="{{ old('email') }}" placeholder="Enter email"
                                required>
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
                                name="password" id="password" placeholder="Enter password" required>
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
                                id="password-confirm" placeholder="Enter password" required>
                                <span id="togglePasswordConfirm" class="toggle-password text-bg-dark"><i class="fa fa-eye"></i></span>
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
@endsection
