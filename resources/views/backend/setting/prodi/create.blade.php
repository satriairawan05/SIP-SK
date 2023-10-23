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
            <div class="card-body">
                <form action="{{ route('prodi.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Name <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('name')
                            is-invalid
                        @enderror"
                                name="name" id="name" value="{{ old('name') }}" placeholder="Enter name" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="alias">Alias <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('alias')
                            is-invalid
                        @enderror"
                                name="alias" id="alias" value="{{ old('alias') }}" placeholder="Enter alias"
                                required>
                            @error('alias')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="jenjang">Jenjang<sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('jenjang')
                            is-invalid
                        @enderror"
                                name="jenjang"value="{{ old('jenjang') }}" id="jenjang" placeholder="Enter jenjang">
                            @error('jenjang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="code">Code</label>
                            <input type="text"
                                class="form-control form-control-sm @error('code')
                            is-invalid
                        @enderror"
                                name="code"value="{{ old('code') }}" id="code" placeholder="Enter code">
                            @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="jurusan_id">Jurusan<sup class="text-danger">*</sup></label>
                            <select name="jurusan_id"class="form-control form-control-sm" id="jurusan_id">
                                @foreach ($jurusan as $j)
                                    @if (old('jurusan_id') == $j->jurusan_id)
                                        <option value="{{ $j->jurusan_id }}"name="jurusan_id" selected>
                                            {{ $j->jurusan_name }}</option>
                                    @else
                                        <option value="{{ $j->jurusan_id }}"name="jurusan_id">
                                            {{ $j->jurusan_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('prodi.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fa fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
