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
            <div class="card-body">
                @foreach ($surat as $s)
                    <li class="list-group-item"><a href="?js_id={!! $s->js_id !!}"
                            class="text-decoration-none">{{ $s->js_jenis }}</a></li>
                @endforeach
            </div>
        </div>
    </div>
@endsection
