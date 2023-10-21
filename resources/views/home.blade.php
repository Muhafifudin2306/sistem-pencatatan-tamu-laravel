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
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVisitor">+
                                        Tambah Data Pengujung</button>
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
                                        <th>Jam Masuk</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Aksi</th>
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
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->jam_masuk }}</td>
                                            <td>{{ $item->tanggal_masuk }}</td>
                                            <td>{{ $item->jam_keluar }}</td>
                                            <td>{{ $item->tanggal_keluar }}</td>
                                            <td>
                                                <form method="POST" action="{{ url('delete/visitor', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </td>
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

    <div class="modal fade" id="addVisitor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Visitor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('store/visitor') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Nama Pengunjung</label>
                            <input type="text" class="form-control" placeholder="Abdul Alim" name="visitor_name">
                        </div>

                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">NIK</label>
                            <input type="text" class="form-control" placeholder="32312122" name="nik">
                        </div>

                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Nomor Telpon</label>
                            <input type="text" class="form-control" placeholder="0836328282" name="phone">
                        </div>

                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Jam Masuk</label>
                            <input type="time" class="form-control" name="jam_masuk">
                        </div>

                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tanggal_masuk">
                        </div>

                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Jam Keluar</label>
                            <input type="time" class="form-control" name="jam_keluar">
                        </div>

                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Tanggal Keluar</label>
                            <input type="date" class="form-control" name="tanggal_keluar">
                        </div>

                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3" name="address"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="visitor_name" class="form-label">Tujuan</label>
                            <textarea class="form-control" rows="3" name="purpose"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
