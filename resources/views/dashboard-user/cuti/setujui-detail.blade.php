@extends('dashboard-user.index')

@section('user-content')
<div class="container mt-4">
    <div class="row d-flex justify-content-between align-items-center mt-2">
        <div class="col-6">
            <a href="{{ route('user.cuti.setujui') }}" class="text-decoration-none"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
        </div>
    </div>
    <div class="row mt-2 d-flex justify-content-between align-items-center mb-3">
        <div class="col-6">
            <h6>Detail Setujui Cuti</h6>
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#PengajuanCuti">Setujui</button>
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#PengajuanCuti">Tolak</button>
        </div>
    </div>
    <div class="row min-vh-100 mt-2">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-informasi">
                <tbody>
                    <tr>
                        <td class="fw-bold w-50">Nama Pegawai</td>
                        <td>: Muhamad Affan Akmal</td>
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
                        <td class="fw-bold w-50">Jenis Cuti</td>
                        <td>: Cuti Tahunan</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Alasan</td>
                        <td>: Kuliah</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Selama</td>
                        <td>: 2 Hari</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Tanggal Mulai</td>
                        <td>: 20 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Tanggal Berakhir</td>
                        <td>: 22 Oktober 2024</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Tahun Cuti</td>
                        <td>: 2024</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Sisa Cuti</td>
                        <td>: 10 Hari</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Keterangan Cuti</td>
                        <td>: N-2</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Alamat Selama Menjalankan Cuti</td>
                        <td>: Jakarta</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Pertimbangan Atasan</td>
                        <td>: Disetujui</td>
                    </tr>
                    <tr>
                        <td class="fw-bold w-50">Keputusan Pejabat</td>
                        <td>: Disetujui</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
