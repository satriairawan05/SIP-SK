@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('organisasi.index') }}">{{ $name }}</a></li>
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
                <form action="{{ route('organisasi.update', $organisasi->organisasi_id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="organisasi_nama">Nama <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('organisasi_nama')
                            is-invalid
                        @enderror"
                                name="organisasi_nama" id="organisasi_nama"
                                value="{{ old('organisasi_nama', $organisasi->organisasi_nama) }}" placeholder="Enter Name"
                                required>
                            @error('organisasi_nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="organisasi_status">Status <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('organisasi_status')
                            is-invalid
                        @enderror"
                                name="organisasi_status" id="organisasi_status"
                                value="{{ old('organisasi_status', $organisasi->organisasi_status) }}"
                                placeholder="Enter Status" required>
                            @error('organisasi_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="organisasi_periode">Periode <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('organisasi_periode')
                            is-invalid
                        @enderror"
                                name="organisasi_periode" id="organisasi_periode"
                                value="{{ old('organisasi_periode', $organisasi->organisasi_periode) }}"
                                placeholder="Enter Periode" required>
                            @error('organisasi_periode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="organisasi_affiliate"
                                    id="organisasi_affiliate" {!! $organisasi->organisasi_affiliate == 1 ? 'checked' : '' !!}>
                                <label class="form-check-label" for="organisasi_affiliate">Affiliate to Prodi</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 d-none" id="prodi">
                            <label for="prodi_id">Program Studi</label>
                            <select name="prodi_id" class="form-control form-control-sm select2-single-placeholder"
                                id="prodi_id">
                                <option value="">Select Program Studi</option>
                                @foreach ($prodi as $p)
                                    @if (old('prodi_id', $organisasi->prodi_id) == $p->prodi_id)
                                        <option value="{{ $p->prodi_id }}" name="prodi_id" selected>
                                            {{ $p->prodi_nama }}</option>
                                    @else
                                        <option value="{{ $p->prodi_id }}" name="prodi_id">
                                            {{ $p->prodi_nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('organisasi.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('ruang-admin/js/organisasi.min.js') }}"></script>
@endsection
