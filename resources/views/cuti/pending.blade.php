@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Cuti</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="export-wrapper">
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-file-pdf"></i> Export PDF</button>
                    <button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-file-excel"></i> Export Excel</button>
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
                            <th>Tipe Cuti</th>
                            <th>Status</th>
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
                            <td>Cuti Tahunan</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td class="aksi">
                                <a href="/dashboard/cuti/pending/detail" class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></a>
                                <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CutiModal" tabindex="-1" aria-labelledby="CutiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="CutiModalLabel">Tambah Daftar Cuti</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="CutiForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="cuti_id" name="cuti_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_pangkat" placeholder="Tipe Cuti"
                                name="nama_pangkat" required>
                            <label for="nama_pangkat">Tipe Cuti</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tanggal_mulai" placeholder="Tanggal Mulai"
                                name="tanggal_mulai" required>
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tanggal_berakhir" placeholder="Tanggal Berakhir"
                                name="tanggal_berakhir" required>
                            <label for="tanggal_berakhir">Tanggal Berakhir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="alasan" placeholder="Alasan"
                                name="alasan" required>
                            <label for="alasan">Alasan</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" form="jabatanForm" class="btn btn-primary btn-sm"
                        id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
