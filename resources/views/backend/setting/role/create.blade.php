@extends('backend.layout.app')

@section('app')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">{{ $name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="card col-12">
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row mb-3">
                            <div class="col-2">
                                <p for="name">Role Name <span class="text-danger">*</span> </p>
                            </div>
                            <div class="col-10">
                                <input type="text"
                                    class="form-control form-control-sm @error('group_name')
                                    is-invalid
                                @enderror"
                                    id="group_name" placeholder="Masukan Role Name" value="{{ old('group_name') }}"
                                    name="group_name" required>
                                @error('group_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <table class="table-hover text-nowrap table">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th class="text-center">Pages</th>
                                            <th class="text-center">Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($page_distincts as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-center">{!! str_replace('_', ' ', $d->page_name) !!}</td>
                                                <td class="text-center">
                                                    @foreach ($pages as $p)
                                                        @if (str_replace('_', ' ', $p->page_name) == str_replace('_', ' ', $d->page_name))
                                                            <div class="d-inline">
                                                                <input type="checkbox" id="{!! $p->page_id !!}"
                                                                    name="{!! $p->page_id !!}">
                                                                <label for="{!! $p->page_id !!}">
                                                                    {{ $p->action }}
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{ route('role.index') }}" class="btn btn-sm btn-info mx-2"><i
                                        class="fas fa-reply-all"></i></a>
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
