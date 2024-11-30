@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <a href="{{ route('profiling.index') }}" class="mt-3 text-decoration-none"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <div class="row mb-md-0 mb-3 mt-3"> <!-- Add mb-3 for small screens and mb-md-0 for larger screens -->
            <div class="col-md-6">
                <h5 class="mb-4">Detail Profiling Nama</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-lg-3 mb-4">
                <div class="card bg-warning-subtle">
                    <div class="card-body">
                        <div class="card-info">
                            <h3 class="mb-0">4</h3>
                            <p class="m-0">Cuti</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-lg-3 mb-4">
                <div class="card bg-success-subtle">
                    <div class="card-body">
                        <div class="card-info">
                            <div class="card-info">
                                <h3 class="mb-0">4</h3>
                                <p class="m-0">Izin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-lg-3 mb-4">
                <div class="card bg-danger-subtle">
                    <div class="card-body">
                        <div class="card-info">
                            <h3 class="mb-0">4</h3>
                            <p class="m-0">Lupa Rekam Kehadiran</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="th-number">No</th>
                            <th>Jenis Ketidakhadiran</th>
                            <th>Alasan</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>91231238</td>
                            <td>Penata Muda - III/a</td>
                            <td class="aksi">
                                <a type="button" href="{{ route('profiling.detail') }}" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
