@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-check"></i><b> Success!</b></h6>
                    {{ session('success') }}
                </div>
            @endif
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
                <form action="{{ route('mahasiswa.changepassword_update', $mahasiswa->mhs_id) }}" method="post">
                    @csrf
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
                            <span id="togglePasswordConfirm" class="toggle-password text-bg-dark"><i
                                    class="fa fa-eye"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ auth()->guard('admin')->check() ?  route('dashboard') : route('home') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
