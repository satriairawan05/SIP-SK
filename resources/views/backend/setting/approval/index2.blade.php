@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('approval.index') }}">{{ $name }}</a></li>
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
            <div class="card-header d-flex justify-content-end">
                <a href="#" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body">
                <table class="align-items-center table-flush table" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Jenis Surat</th>
                            <th>Nama</th>
                            <th>Ordinal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approval as $app)
                            <tr>
                                <td>
                                    <input type="text" name="js_jenis" id="js_jenis" value="{{ $surat->js_jenis }}"
                                        class="form-control form-control-sm" readonly>
                                </td>
                                <td>
                                    <select name="user_id" class="form-control form-control-sm" id="user_id">
                                        @foreach ($user as $u)
                                            @if (old('user_id',$app->user_id) == $u->id)
                                                <option value="{{ $u->id }}" name="user_id" selected>
                                                    {{ $u->nama }}</option>
                                            @else
                                                <option value="{{ $u->id }}" name="user_id">
                                                    {{ $u->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="app_ordinal" id="app_ordinal" min="1" max="6" value="{{ old('app_ordinal',$app->app_ordinal) }}">
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

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete {{ $sign->sign_nama }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <form action="{{ route('approval.destroy',$app->app_id) }}" method="post">
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
                        <form action="{{ route('approval.store') }}" method="post">
                            @csrf
                            <tr>
                                <td>
                                    <input type="text" name="js_jenis" id="js_jenis" value="{{ $surat->js_jenis }}"
                                        class="form-control form-control-sm" readonly>
                                </td>
                                <td>
                                    <select name="user_id" class="form-control form-control-sm" id="user_id">
                                        @foreach ($user as $u)
                                            @if (old('user_id') == $u->id)
                                                <option value="{{ $u->id }}" name="user_id" selected>
                                                    {{ $u->nama }}</option>
                                            @else
                                                <option value="{{ $u->id }}" name="user_id">
                                                    {{ $u->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="app_ordinal" id="app_ordinal" min="1" max="6" value="{{ old('app_ordinal') }}">
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
