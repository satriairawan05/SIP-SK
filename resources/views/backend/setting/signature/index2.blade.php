@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('signature.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $surat->js_jenis }}</li>
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
            <div class="card-body">
                <table class="align-items-center table-flush table" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Jenis Surat</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Nip</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($signature as $sign)
                            <form action="{{ route('signature.update', $sign->sign_id) }}" method="post">
                                @csrf
                                @method('put')
                                <tr>
                                    <td>
                                        <input type="text" readonly value="{{ $surat->js_jenis }}"
                                            class="form-control form-control-sm" name="js_jenis">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" name="sign_nama"
                                            value="{{ old('sign_nama', $sign->sign_nama) }}" placeholder="Enter Name">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" name="sign_jabatan"
                                            value="{{ old('sign_jabatan', $sign->sign_jabatan) }}"
                                            placeholder="Enter Position">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" name="sign_nip"
                                            value="{{ old('sign_nip', $sign->sign_nip) }}" placeholder="Enter Nip">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-warning"><i
                                                class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#exampleModal" id="#myBtn">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </form>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                {{ $sign->sign_nama }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('signature.destroy', $sign->sign_id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <table class="align-items-center table-flush mt-2 table">
                    <thead class="thead-light">
                        <tr>
                            <th>Jenis Surat</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Nip</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('signature.store') }}" method="post">
                            @csrf
                            <tr>
                                <td>
                                    <input type="text" readonly value="{{ $surat->js_jenis }}"
                                        class="form-control form-control-sm" name="js_jenis">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" name="sign_nama"
                                        value="{{ old('sign_nama') }}" placeholder="Enter Name">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" name="sign_jabatan"
                                        value="{{ old('sign_jabatan') }}" placeholder="Enter Position">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" name="sign_nip"
                                        value="{{ old('sign_nip') }}" placeholder="Enter Nip">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success"><i
                                            class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
