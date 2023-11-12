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
                <a href="{{ route('sko.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
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
                        @foreach ($organisasi as $org)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $org->sko_no_surat != null ? $org->sko_no_surat : $org->sko_uuid }}</td>
                                <td>{{ $org->sko_subject }}</td>
                                <td>{{ $org->sko_disposisi ?? 'belum ada data' }}</td>
                                <td>{{ $org->sko_created ?? 'belum ada data' }}</td>
                                <td>{{ $org->sko_updated ?? 'belum ada data' }}</td>
                                <td>{{ \Carbon\Carbon::parse($org->sko_last_print)->isoFormat('DD MMMM YYYY') ?? 'belum ada data' }}</td>
                                <td>
                                    <a href="{{ route('sko.show', $org->sko_id) }}" target="__blank"
                                        class="btn btn-sm btn-info"><i class="fas fa-print"></i></a>
                                    @if (
                                        \App\Models\Approval::where(
                                            'user_id',
                                            auth()->guard('admin')->user()->id)->first() ==
                                            auth()->guard('admin')->user()->id &&
                                            $suratKeputusanOrganisasi->sko_approved_step ==
                                                \App\Models\Approval::where('app_ordinal', $suratKeputusanOrganisasi->sko_approved_step)->whereNull('app_status')->first())
                                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                                            data-target="#exampleModal" id="#myBtn">
                                            <i class="fas fa-check-square"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Approved
                                                            {{ $org->sko_subject }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('sko.approval_update', $org->sko_id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <label for="sko_disposisi">Disposisi</label>
                                                                <select name="sko_disposisi"
                                                                    class="form-control form-control-sm select2-single-placeholder"
                                                                    id="sko_disposisi">
                                                                    <option value="">Select Disposisi</option>
                                                                    @php
                                                                        $disposisi = [['status' => 'Accepted'], ['status' => 'Rejected']];
                                                                    @endphp
                                                                    @foreach ($disposisi as $d)
                                                                        @if (old('sko_disposisi') == $d['status'])
                                                                            <option value="{{ $d['status'] }}"
                                                                                name="sko_disposisi" selected>
                                                                                {{ $d['status'] }}</option>
                                                                        @else
                                                                            <option value="{{ $d['status'] }}"
                                                                                name="sko_disposisi">
                                                                                {{ $d['status'] }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="row">
                                                                <label for="sko_remark">Remark</label>
                                                                <textarea name="sko_remark" id="sko_remark" cols="20" rows="10">{{ old('sko_remark') }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                    @endif
                                    <a href="{{ route('sko.edit', $org->sko_id) }}" class="btn btn-sm btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('sko.destroy', $org->sko_id) }}" method="post"
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
