@extends('mahasiswa.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-check"></i><b> Success!</b></h6>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-exclamation-triangle"></i><b> Failed!</b></h6>
                    {{ session('failed') }}
                </div>
            @endif
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('skks.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <table class="align-items-center table-flush table" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>No Surat</th>
                            <th>Subject Surat</th>
                            <th>Disposisi</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Last Print</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatan as $kgt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kgt->skk_no_surat != null ? $kgt->skk_no_surat : $kgt->skk_uuid }}</td>
                                <td>{{ $kgt->skk_subject }}</td>
                                <td>{{ $kgt->skk_disposisi ?? 'belum ada data' }}</td>
                                <td>{{ $kgt->skk_created ?? 'belum ada data' }}</td>
                                <td>{{ $kgt->skk_updated ?? 'belum ada data' }}</td>
                                <td>{{ \Carbon\Carbon::parse($kgt->skk_last_print)->isoFormat('DD MMMM YYYY') ?? 'belum ada data' }}</td>
                                <td>
                                    <a href="{{ route('skks.show', $kgt->skk_id) }}" target="__blank"
                                        class="btn btn-sm btn-info"><i class="fas fa-print"></i></a>
                                    <a href="{{ route('skks.edit', $kgt->skk_id) }}" class="btn btn-sm btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('skks.destroy', $kgt->skk_id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
