<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Surat Keputusan Politeknik Pertanian Negeri Samarinda">
    <meta name="author" content="Deuwi Satriya Irawan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('ruang-admin/img/logo/logo.png') }}" rel="icon">
    <title>{{ env('APP_NAME') }} - Login</title>
    <link href="{{ asset('ruang-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('ruang-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('ruang-admin/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ruang-admin/css/politani.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-login politani">
