@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            <div class="card-header">
                <h3 class="text-bold text-center">Hello, <span
                        class="text-danger">{{ auth()->guard('admin')->check()? auth()->user()->name: auth()->guard('mahasiswa')->user()->mhs_nama }}</span>.
                </h3>
                <h5 class="text-bold text-center">Welcome to <span class="text-danger">Sistem Informasi Pengajuan Surat
                        Politeknik Pertanian Negeri
                        Samarinda</span>.</h5>
            </div>
        </div>
    </div>
@endsection
