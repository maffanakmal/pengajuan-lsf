@extends('dashboard-user.index')

@section('user-content')
<div class="container mt-4">
    <div class="row d-flex justify-content-between align-items-center mt-2">
        <div class="col-6">
            <a href="/pegawai/cuti/setujui" class="text-decoration-none"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
        </div>
    </div>
    <div class="row mt-2 d-flex justify-content-between align-items-center mb-3">
        <div class="col-6">
            <h6>Detail Setujui Izin</h6>
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#PengajuanIzin">Setujui</button>
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#PengajuanIzin">Tolak</button>
        </div>
    </div>
    <div class="row mt-2">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-informasi">
                <tbody>
                    <tr>
                        <td class="fw-bold w-50">Nama Pegawai</td>
                        <td>: Muhamad Affan Akmal</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">NIP</td>
                        <td>: 2003260620259312</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Pangkat/Gol</td>
                        <td>: Penata Muda (III/a)</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Jabatan</td>
                        <td>: Tenaga Sensor</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Unit Kerja</td>
                        <td>: Lembaga Sensor Film</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Jenis Izin</td>
                        <td>: Izin Pulang Lebih Cepat Dari Waktu Kepulangan Kerja</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Selama</td>
                        <td>: 2 Jam</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Tanggal Izin</td>
                        <td>: 25 November 2024</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Alasan</td>
                        <td>: Ada keperluan keluarga mendesak</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection