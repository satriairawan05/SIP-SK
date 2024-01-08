@extends('backend.layout.app')

@section('app')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sko.index') }}">{{ $name }}</a></li>
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
            <form action="{{ route('sko.update', $keputusan->sko_id) }}" method="post">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="sko_subject">Subject <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control form-control-sm @error('sko_subject')
                            is-invalid
                        @enderror" name="sko_subject" id="sko_subject" value="{{ old('sko_subject', $keputusan->sko_subject) }}" placeholder="Enter Subject" required>
                        @error('sko_subject')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6" id="simple-date">
                        <label for="sko_tgl_surat">Tanggal Surat <sup class="text-danger">*</sup></label>
                        <div class="input-group date">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="date" class="form-control form-control-sm @error('sko_tgl_surat')
                            is-invalid
                        @enderror" value="{{ old('sko_tgl_surat', date('Y-m-d')) }}" name="sko_tgl_surat" id="sko_tgl_surat" required>
                        </div>
                        @error('sko_tgl_surat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="organisasi_id">Organisasi <sup class="text-danger">*</sup></label>
                        <td>:</td>
                        <td> {{ $keputusan->organisasi_id }}</td>
                        {{--<select name="organisasi_id" class="form-control form-control-sm select2-single-placeholder" id="organisasi_id">
                            <option value="">Select Organisasi</option>
                            @foreach ($organisasi as $p)
                            @if (old('organisasi_id', $keputusan->organisasi_id) == $p->organisasi_id)
                            <option value="{{ $p->organisasi_id }}" name="organisasi_id" selected>
                                {{ $p->organisasi_nama }}</option>
                            @else
                            <option value="{{ $p->organisasi_id }}" name="organisasi_id">
                                {{ $p->organisasi_nama }}</option>
                            @endif
                            @endforeach
                        </select> --}}
                
                        @error('organisasi_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="sko_no_surat">Nomor Surat</label>
                        <input type="text" name="sko_no_surat" id="sko_no_surat" class="form-control form-control-sm" placeholder="Masukan Nomor Surat">
                    </div>
                </div>
                {{-- <div class="row mb-3">
                        <div class="col-6">
                            <label for="sko_menimbang">Menimbang <sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="sko_menimbang" id="sko_menimbang" cols="50" rows="10">{{ old('sko_menimbang', $keputusan->sko_menimbang) }}</textarea>
                @error('sko_menimbang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
        </div>
        <div class="col-6">
            <label for="sko_mengingat">Mengingat <sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_mengingat" id="sko_mengingat" cols="50" rows="10">{{ old('sko_mengingat', $keputusan->sko_mengingat) }}</textarea>
            @error('sko_mengingat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="sko_memperhatikan">Memperhatikan <sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_memperhatikan" id="sko_memperhatikan" cols="50" rows="10">{{ old('sko_memperhatikan', $keputusan->sko_memperhatikan) }}</textarea>
            @error('sko_memperhatikan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="sko_menetapkan">Menetapkan <sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_menetapkan" id="sko_menetapkan" cols="50" rows="10">{{ old('sko_menetapkan', $keputusan->sko_menetaokan) }}</textarea>
            @error('sko_menetapkan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="sko_kesatu">Kesatu <sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_kesatu" id="sko_kesatu" cols="50" rows="10">{{ old('sko_kesatu', $keputusan->sko_kesatu) }}</textarea>
            @error('sko_kesatu')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="sko_kedua">Kedua<sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_kedua" id="sko_kedua" cols="50" rows="10">{{ old('sko_kedua', $keputusan->sko_kedua) }}</textarea>
            @error('sko_kedua')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="sko_ketiga">Ketiga <sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_ketiga" id="sko_ketiga" cols="50" rows="10">{{ old('sko_ketiga', $keputusan->sko_ketiga) }}</textarea>
            @error('sko_ketiga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="sko_keempat">Keempat<sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_keempat" id="sko_keempat" cols="50" rows="10">{{ old('sko_keempat', $keputusan->sko_keempat) }}</textarea>
            @error('sko_keempat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="sko_kelima">Kelima<sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_kelima" id="sko_kelima" cols="50" rows="10">{{ old('sko_kelima', $keputusan->sko_kelima) }}</textarea>
            @error('sko_kelima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="sko_tembusan">Tembusan<sup class="text-danger">*</sup></label>
            <textarea class="ckeditor form-control" name="sko_tembusan" id="sko_tembusan" cols="50" rows="10">{{ old('sko_tembusan', $keputusan->sko_tembusan) }}</textarea>
        </div> 
    </div> --}}
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <a href="{{ route('sko.index') }}" class="btn btn-sm btn-info mx-2"><i class="fas fa-reply-all"></i></a>
            <button type="submit" class="btn btn-sm btn-success">Submit</button>
        </div>
    </div>
    </form>
</div>
</div>
</div>
@endsection
