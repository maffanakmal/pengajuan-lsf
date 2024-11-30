@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Pengajuan Lupa Rekam Absen</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">Cari pegawai</button>
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
                                <a type="button" class="btn btn-primary btn-sm" onclick="addPengajuan()">
                                    <i class="fa-solid fa-plus"></i> Pengajuan
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="PengajuanModal" tabindex="-1" aria-labelledby="PengajuanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PengajuanModalLabel">Tambah Pengajuan Cuti</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="PengajuanForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="pengajuan_id" name="pengajuan_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_pegawai" placeholder="Nama Pegawai"
                                name="nama_pegawai" required disabled>
                            <label for="nama_pegawai">Nama Pegawai</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nip" placeholder="NIP"
                                name="nip" required disabled>
                            <label for="nip">NIP</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jabatan" placeholder="Jabatan"
                                name="jabatan" required disabled>
                            <label for="jabatan">Jabatan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="unit_kerja" placeholder="Unit Kerja"
                                name="unit_kerja" required disabled>
                            <label for="unit_kerja">Unit Kerja</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="hari" placeholder="Hari"
                            name="hari" required>
                            <label for="hari">Hari</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl_lupa" placeholder="Tanggal"
                            name="tgl_lupa" required>
                            <label for="tgl_lupa">Tanggal</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Jenis Lupa Rekam Kehadiran</option>
                            <option value="">Kedatangan Kerja</option>
                            <option value="2">Kepulangan Kerja</option>
                        </select>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alasan" id="alasan" name="alasan"
                                style="height: 100px" required></textarea>
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

    <script>
        // Function to handle "Add Jabatan" button
        function addPengajuan() {
            // Clear form
            $('#PengajuanForm').trigger('reset');

            // Update modal title
            $('#PengajuanModalLabel').text('Tambah Daftar Pengajuan');

            // Set form action for adding a new Pengajuan
            $('#PengajuanForm').attr('action', '/pengajuan/store');

            // Hide the hidden ID field
            $('#pengajuan_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#PengajuanModal').modal('show');
        }
    </script>
@endsection
