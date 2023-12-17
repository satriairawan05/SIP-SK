@extends('backend.layout.app')

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
                <a href="{{ route('jenis_surat.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <table class="align-items-center table-flush table" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Jenis Surat</th>
                            <th>Kode</th>
                            <th>Nomor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($surat) == 2)
                            @foreach ($surat as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->js_jenis }}</td>
                                    <td>{{ $s->js_kode }}</td>
                                    <td>{{ $s->js_nomor }}</td>
                                    <td>
                                        <a href="{{ route('jenis_surat.edit', $s->js_id) }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('jenis_surat.destroy', $s->js_id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
