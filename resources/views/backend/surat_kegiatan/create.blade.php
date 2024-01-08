@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('skk.index') }}">{{ $name }}</a></li>
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
                <form action="{{ route('skk.store') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="skk_subject">Subject <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('skk_subject')
                            is-invalid
                        @enderror"
                                name="skk_subject" id="skk_subject" value="{{ old('skk_subject') }}"
                                placeholder="Enter Subject" required>
                            @error('skk_subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6" id="simple-date">
                            <label for="skk_tgl_surat">Tanggal Surat <sup class="text-danger">*</sup></label>
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date"
                                    class="form-control form-control-sm @error('skk_tgl_surat')
                            is-invalid
                        @enderror"
                                    value="{{ old('skk_tgl_surat', date('Y-m-d')) }}" name="skk_tgl_surat" id="skk_tgl_surat"
                                    required>
                            </div>
                            @error('skk_tgl_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <div class="col-6">
                            <label for="skk_menimbang">Menimbang <sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_menimbang" id="skk_menimbang" cols="50" rows="10">{{ old('skk_menimbang') }}</textarea>
                            @error('skk_menimbang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="skk_mengingat">Mengingat <sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_mengingat" id="skk_mengingat" cols="50" rows="10">{{ old('skk_mengingat') }}</textarea>
                            @error('skk_mengingat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="skk_memperhatikan">Memperhatikan <sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_memperhatikan" id="skk_memperhatikan" cols="50" rows="10">{{ old('skk_memperhatikan') }}</textarea>
                            @error('skk_memperhatikan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="skk_menetapkan">Menetapkan <sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_menetapkan" id="skk_menetapkan" cols="50" rows="10">{{ old('skk_menetapkan') }}</textarea>
                            @error('skk_menetapkan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="skk_kesatu">Kesatu <sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_kesatu" id="skk_kesatu" cols="50" rows="10">{{ old('skk_kesatu') }}</textarea>
                            @error('skk_kesatu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="skk_kedua">Kedua<sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_kedua" id="skk_kedua" cols="50" rows="10">{{ old('skk_kedua') }}</textarea>
                            @error('skk_kedua')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="skk_ketiga">Ketiga <sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_ketiga" id="skk_ketiga" cols="50" rows="10">{{ old('skk_ketiga') }}</textarea>
                            @error('skk_ketiga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="skk_keempat">Keempat<sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_keempat" id="skk_keempat" cols="50" rows="10">{{ old('skk_keempat') }}</textarea>
                            @error('skk_keempat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- <div class="row mb-3">
                        <div class="col-12">
                            <label for="skk_tembusan">Tembusan<sup class="text-danger">*</sup></label>
                            <textarea class="ckeditor form-control" name="skk_tembusan" id="skk_tembusan" cols="50" rows="10">{{ old('skk_tembusan') }}</textarea>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('skk.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#simple-date .input-group.date').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });
    </script>
@endsection
