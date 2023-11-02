@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('jenis_surat.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            <div class="card-body">
                <form action="{{ route('jenis_surat.update',$surat->js_id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="js_jenis">Jenis <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('js_jenis')
                            is-invalid
                        @enderror"
                                name="js_jenis" id="js_jenis" value="{{ old('js_jenis',$surat->js_jenis) }}" placeholder="Enter Jenis Surat"
                                required>
                            @error('js_jenis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="js_kode">Kode <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('js_kode')
                            is-invalid
                        @enderror"
                                name="js_kode" id="js_kode" value="{{ old('js_kode',$surat->js_kode) }}" placeholder="Enter Kode Surat"
                                required>
                            @error('js_kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="js_nomor">Nomor <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('js_nomor')
                            is-invalid
                        @enderror"
                                name="js_nomor" id="js_nomor" value="{{ old('js_nomor',$surat->js_nomor) }}" placeholder="Enter Nomor Surat"
                                required>
                            @error('js_nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('jenis_surat.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
