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
            <div class="card-body">
                <form action="{{ route('kegiatan.update', $kegiatan->kegiatan_id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="organisasi_id">Organisasi</label>
                            <select name="organisasi_id" class="form-control form-control-sm" id="organisasi_id">
                                @foreach ($organisasi as $org)
                                    @if (old('organisasi_id', $kegiatan->organisasi_id) == $org->organisasi_id)
                                        <option value="{{ $org->organisasi_id }}" name="organisasi_id" selected>
                                            {{ $org->organisasi_nama }}</option>
                                    @else
                                        <option value="{{ $org->organisasi_id }}" name="organisasi_id">
                                            {{ $org->organisasi_nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('organisasi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="kegiatan_anggaran">Anggaran <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('kegiatan_anggaran')
                            is-invalid
                        @enderror"
                                name="kegiatan_anggaran" id="kegiatan_anggaran"
                                value="{{ old('kegiatan_anggaran', $kegiatan->kegiatan_anggaran) }}"
                                placeholder="Enter Anggaran" required>
                            @error('kegiatan_anggaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
