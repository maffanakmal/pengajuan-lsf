@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Profiling Pegawai</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Cari Pegawai" aria-label="Search"
                        aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="th-number">No</th>
                            <th>Nomor Induk Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                            <th>Pangkat</th>
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
                            <td>Muhamad Affan Akmal</td>
                            <td>Biro Kepegawaian</td>
                            <td>Administrator</td>
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
