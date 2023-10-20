@extends('layouts.app')

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}"> --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>

                <section class="data">
                    <div class="py-4">
                        <div class="top-data py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="title-top">
                                    <h4 class="fw-bold">Tabel Pengunjung</h4>
                                </div>
                                <div class="button-top">
                                    <button class="btn btn-primary">+ Tambah Data Pengujung</button>
                                </div>
                            </div>
                        </div>
                        <div class="button-data py-3">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengunjung</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>Nomot Telpon</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Keluar</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody>
                                    @foreach ($visitors as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->visitor_name }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->tanggal_masuk }}</td>
                                            <td>{{ $item->tanggal_keluar }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
