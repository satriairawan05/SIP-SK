@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('archive.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $surat->js_jenis }}</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            <div class="card-body">
                @if ($surat->js_id == 1)
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
                            @foreach ($organisasi as $org)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $org->sko_no_surat != null ? $org->sko_no_surat : $org->sko_uuid }}</td>
                                    <td>{{ $org->sko_subject }}</td>
                                    <td>{{ $org->sko_disposisi ?? 'belum ada data' }}</td>
                                    <td>{{ $org->sko_created ?? 'belum ada data' }}</td>
                                    <td>{{ $org->sko_updated ?? 'belum ada data' }}</td>
                                    <td>{{ $org->sko_last_print ?? 'belum ada data' }}</td>
                                    <td>
                                        <a href="{{ route('sko.show', $org->sko_id) }}" target="__blank"
                                            class="btn btn-sm btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
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
                                    <td>{{ $kgt->skk_last_print ?? 'belum ada data' }}</td>
                                    <td>
                                        <a href="{{ route('skk.show', $kgt->skk_id) }}" target="__blank"
                                            class="btn btn-sm btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
