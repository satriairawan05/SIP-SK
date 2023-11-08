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
    <!-- Total Mahasiswa -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Mahasiswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Organisasi -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Organisasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $organisasi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users-cog fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Surat Menunggu Persetujuan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Surat Menunggu Persetujuan</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">55</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Surat -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Surat Disetujui</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="card col-12">
        <div class="card-header">
            <h3 class="text-bold text-center">Hello, <span class="text-danger">{{ auth()->guard('admin')->check()? auth()->user()->name: auth()->guard('mahasiswa')->user()->mhs_nama }}</span>.
            </h3>
            <h5 class="text-bold text-center">Welcome to <span class="text-danger">Sistem Informasi Pengajuan Surat
                    Politeknik Pertanian Negeri
                    Samarinda</span>.</h5>
        </div>
    </div>
</div>
@endsection
