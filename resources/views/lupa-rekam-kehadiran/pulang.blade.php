@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Lupa Rekam Kehadiran Pulang Kerja</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="export-wrapper">
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-file-pdf"></i> Export PDF</button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
        <div class="row mb-3 d-flex align-items-center">
            <div class="col-md-2">
                <div class="mb-3 input-group-sm">
                    <input type="date" class="form-control" id="startDate" placeholder="name@example.com">
                </div>
            </div>
            <div class="col-auto">
                <p class="mb-0">Sampai Dengan</p>
            </div>
            <div class="col-md-2">
                <div class="mb-3 input-group-sm">
                    <input type="date" class="form-control" id="endDate" placeholder="name@example.com">
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-3 input-group-sm">
                    <button class="btn btn-primary" type="button" id="button-addon2">Filter Data</button>
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="th-number">No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Tipe Lupa Rekam Kehadiran</th>
                            <th>Tanggal</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>123456789</td>
                            <td>Ahmad Fauzi</td>
                            <td>Lupa Rekam Kepulangan Kerja</td>
                            <td>23 November 2024</td>
                            <td class="aksi">
                                <a href="{{ route('lupa-rekam.pulang.detail') }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></a>
                                <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
@endsection
