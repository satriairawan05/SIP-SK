@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('struktur_organisasi.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            <div class="card-body">
                <form action="{{ route('struktur_organisasi.update', $struktur->so_id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="so_nama">Nama <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('so_nama')
                            is-invalid
                        @enderror"
                                name="so_nama" id="so_nama" value="{{ old('so_nama', $struktur->so_nama) }}"
                                placeholder="Enter Nama" required>
                            @error('so_nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="so_jabatan">Jabatan <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('so_jabatan')
                            is-invalid
                        @enderror"
                                name="so_jabatan" id="so_jabatan" value="{{ old('so_jabatan', $struktur->so_jabatan) }}"
                                placeholder="Enter Jabatan" required>
                            @error('so_jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="so_departemen">Departemen <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('so_departemen')
                            is-invalid
                        @enderror"
                                name="so_departemen" id="so_departemen" value="{{ old('so_departemen',$struktur->so_departemen) }}"
                                placeholder="Enter departemen" required>
                            @error('so_departemen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="organisasi_id">Organisasi</label>
                            <select name="organisasi_id" class="form-control form-control-sm select2-single-placeholder"
                                id="organisasi_id">
                                <option value="">Select Organisasi</option>
                                @foreach ($organisasi as $p)
                                    @if (old('organisasi_id', $struktur->organisasi_id) == $p->organisasi_id)
                                        <option value="{{ $p->organisasi_id }}" name="organisasi_id" selected>
                                            {{ $p->organisasi_nama }}</option>
                                    @else
                                        <option value="{{ $p->organisasi_id }}" name="organisasi_id">
                                            {{ $p->organisasi_nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('organisasi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('struktur_organisasi.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
