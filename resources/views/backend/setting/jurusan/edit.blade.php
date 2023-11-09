@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jurusan.index') }}">{{ $name }}</a></li>
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
                <form action="{{ route('jurusan.update', $jurusan->jurusan_id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="jurusan_nama">Name <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('jurusan_nama')
                            is-invalid
                        @enderror"
                                name="jurusan_nama" id="jurusan_nama"
                                value="{{ old('jurusan_nama', $jurusan->jurusan_nama) }}" placeholder="Enter name" required>
                            @error('jurusan_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="jurusan_alias">Alias <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('jurusan_alias')
                            is-invalid
                        @enderror"
                                name="jurusan_alias" id="jurusan_alias"
                                value="{{ old('jurusan_alias', $jurusan->jurusan_alias) }}" placeholder="Enter alias"
                                required>
                            @error('jurusan_alias')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="jurusan_code">Code</label>
                            <input type="text"
                                class="form-control form-control-sm @error('jurusan_code')
                            is-invalid
                        @enderror"
                                name="jurusan_code" value="{{ old('jurusan_code', $jurusan->jurusan_code) }}"
                                id="code" placeholder="Enter code">
                            @error('jurusan_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('jurusan.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
