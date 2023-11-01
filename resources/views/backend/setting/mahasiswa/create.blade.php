@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            <div class="card-body">
                <form action="{{ route('mahasiswa.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="mhs_nama">Name <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('mhs_nama')
                            is-invalid
                        @enderror"
                                name="mhs_nama" id="mhs_nama" value="{{ old('mhs_nama') }}"
                                placeholder="Enter name ex: Nana" required>
                            @error('mhs_nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="mhs_nim">Nim <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('mhs_nim')
                            is-invalid
                        @enderror"
                                name="mhs_nim" id="mhs_nim" value="{{ old('mhs_nim') }}"
                                placeholder="Enter Nim ex: H181######" required>
                            @error('mhs_nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="mhs_jurusan">Jurusan <sup class="text-danger">*</sup></label>
                            <select name="mhs_jurusan" class="form-control form-control-sm" id="mhs_jurusan">
                                @foreach ($jurusan as $j)
                                    @if (old('mhs_jurusan') == $j->jurusan_name)
                                        <option value="{{ $j->jurusan_name }}" name="mhs_jurusan" selected>
                                            {{ $j->jurusan_name }}</option>
                                    @else
                                        <option value="{{ $j->jurusan_name }}" name="mhs_jurusan">
                                            {{ $j->jurusan_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('mhs_jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="mhs_prodi">Program Studi <sup class="text-danger">*</sup></label>
                            <select name="mhs_prodi" class="form-control form-control-sm"
                                id="mhs_prodi">
                                @foreach ($prodi as $p)
                                    @if (old('mhs_prodi') == $p->prodi_name)
                                        <option value="{{ $p->prodi_name }}" name="mhs_prodi" selected>
                                            {{ $p->prodi_name }}</option>
                                    @else
                                        <option value="{{ $p->prodi_name }}" name="mhs_prodi">
                                            {{ $p->prodi_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('mhs_prodi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="mhs_semester">Semester <sup class="text-danger">*</sup></label>
                            <select name="mhs_semester" class="form-control form-control-sm" id="mhs_semester">
                                @foreach ($semester as $s)
                                    @if (old('mhs_semester') == $s)
                                        <option value="{{ $s }}" name="mhs_semester" selected>
                                            {{ $s }}</option>
                                    @else
                                        <option value="{{ $s }}" name="mhs_semester">
                                            {{ $s }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('mhs_semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="mhs_jk">Jenis Kelamin <sup class="text-danger">*</sup></label>
                            <select name="mhs_jk" class="form-control form-control-sm" id="mhs_jk">
                                @foreach ($jenisKelamin as $jk)
                                    @if (old('mhs_jk') == $jk)
                                        <option value="{{ $jk }}" name="mhs_jk" selected>
                                            {{ $jk }}</option>
                                    @else
                                        <option value="{{ $jk }}" name="mhs_jk">
                                            {{ $jk }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('mhs_jk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="mhs_no_hp">No HP <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('mhs_no_hp')
                            is-invalid
                        @enderror"
                                name="mhs_no_hp" id="mhs_no_hp" value="{{ old('mhs_no_hp') }}"
                                placeholder="Enter Phone Number ex: 08##########" required>
                            @error('mhs_no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="mhs_alamat">Alamat <sup class="text-danger">*</sup></label>
                            <input type="text"
                                class="form-control form-control-sm @error('mhs_alamat')
                            is-invalid
                        @enderror"
                                name="mhs_alamat" id="mhs_alamat" value="{{ old('mhs_alamat') }}"
                                placeholder="Enter name ex: Jl. Samratulangi" required>
                            @error('mhs_alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-info mx-2"><i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        const mhsJurusan = document.getElementById('mhs_jurusan');
        const mhsProdi = document.getElementById('mhs_prodi');

        // Mengatur header default untuk setiap permintaan AJAX dengan token CSRF
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        });

        // Contoh permintaan AJAX
        $.ajax({
            url: '/prodi/' + mhsJurusan.value,
            type: 'GET',
            data: {
                // Data yang ingin Anda kirim
                _token: csrfToken
            },
            success: function(response) {
                // Tanggapan dari permintaan AJAX berhasil

            },
            error: function(xhr, status, error) {
                // Penanganan kesalahan permintaan AJAX
            }
        });
    </script>
@endsection
