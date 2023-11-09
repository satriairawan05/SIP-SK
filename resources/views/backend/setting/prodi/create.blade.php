@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('prodi.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                <form action="{{ route('prodi.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="prodi_nama">Name <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('prodi_nama')
                            is-invalid
                        @enderror"
                                name="prodi_nama" id="prodi_nama" value="{{ old('prodi_nama') }}" placeholder="Enter name"
                                required>
                            @error('prodi_nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="prodi_alias">Alias <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('prodi_alias')
                            is-invalid
                        @enderror"
                                name="prodi_alias" id="prodi_alias" value="{{ old('prodi_alias') }}"
                                placeholder="Enter Alias" required>
                            @error('prodi_alias')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="prodi_jenjang">Jenjang<sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('prodi_jenjang')
                            is-invalid
                        @enderror"
                                name="prodi_jenjang" value="{{ old('prodi_jenjang') }}" id="prodi_jenjang"
                                placeholder="Enter jenjang">
                            @error('prodi_jenjang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="prodi_code">Code</label>
                            <input type="text"
                                class="form-control form-control-sm @error('prodi_code')
                            is-invalid
                        @enderror"
                                name="prodi_code" value="{{ old('prodi_code') }}" id="prodi_code" placeholder="Enter code">
                            @error('prodi_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="jurusan_id">Jurusan<sup class="text-danger">*</sup></label>
                            <select name="jurusan_id" class="form-control form-control-sm" id="jurusan_id">
                                @foreach ($jurusan as $j)
                                    @if (old('jurusan_id') == $j->jurusan_id)
                                        <option value="{{ $j->jurusan_id }}" name="jurusan_id" selected>
                                            {{ $j->jurusan_nama }}</option>
                                    @else
                                        <option value="{{ $j->jurusan_id }}" name="jurusan_id">
                                            {{ $j->jurusan_nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('prodi.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
