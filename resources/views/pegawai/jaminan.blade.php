@extends('pegawai.layouts.detail')

@section('detail-content')
    <div class="container mt-4">
        <div class="row mb-md-0 mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Jaminan</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper">
                    <button type="button" class="btn btn-primary btn-sm" onclick="addJaminan()">
                        <i class="fa-solid fa-plus"></i> Tambah Jaminan
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="th-number">No</th>
                            <th>Nama Peserta</th>
                            <th>Nomor Peserta</th>
                            <th>Jenis Jaminan</th>
                            <th>Tanggal Aktivasi</th>
                            <th>Tanggal Aktif</th>
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
                            <td>81732873</td>
                            <td>Klinik Sehat Medika</td>
                            <td>Jl. Sektor 11 No. 23</td>
                            <td>Klinik</td>
                            <td>0812381283</td>
                            <td>Kota Jakarta Selatan</td>
                            <td class="aksi">
                                <button type="button" class="btn btn-warning btn-sm" onclick="editJaminan()">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="JaminanModal" tabindex="-1" aria-labelledby="JaminanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="JaminanModalLabel">Tambah Jaminan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="JaminanForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="jaminan_id" name="jaminan_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_peserta" placeholder="Nama Peserta"
                                name="nama_peserta" required>
                            <label for="nama_peserta">Nama Peserta</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nomor_peserta" placeholder="Nomor Peserta"
                            name="nomor_peserta" required>
                            <label for="nomor_peserta">Nomor Peserta</label>
                        </div>
                        <select class="form-select mb-3">
                            <option selected disabled>Pilih Jenis Jaminan</option>
                            <option value="1">Jaminan Kesehatan</option>
                            <option value="2">Jaminan Keselamatan</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl_aktivasi" placeholder="Tanggal Aktivasi"
                            name="tgl_aktivasi" required>
                            <label for="tgl_aktivasi">Tanggal Aktivasi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tgl_aktif" placeholder="Tanggal Aktif"
                            name="tgl_aktif" required>
                            <label for="tgl_aktif">Tanggal Aktif</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tgl_nonaktif" placeholder="Tanggal Non Aktif"
                            name="tgl_nonaktif" required>
                            <label for="tgl_nonaktif">Tanggal Nonaktif</label>
                        </div>
                        <select class="form-select mb-3">
                            <option selected disabled>Pilih Status Jaminan</option>
                            <option value="1">Aktif</option>
                            <option value="2">Non Aktif</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" form="JaminanForm" class="btn btn-primary btn-sm" id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to handle "Add Jabatan" button
        function addJaminan() {
            // Clear form
            $('#JaminanForm').trigger('reset');

            // Update modal title
            $('#JaminanModalLabel').text('Tambah Jaminan');

            // Set form action for adding a new Jaminan
            $('#JaminanForm').attr('action', '/jaminan/store');

            // Hide the hidden ID field
            $('#asuransi_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#JaminanModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editJaminan(id, nama, deskripsi) {
            // Pre-fill form with existing data
            $('#department_id').val(id);
            $('#nama_department').val(nama);
            $('#deskripsi').val(deskripsi);

            // Update modal title
            $('#JaminanModalLabel').text('Edit Jaminan');

            // Set form action for updating Jaminan
            $('#JaminanForm').attr('action', '/jaminan/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#JaminanModal').modal('show');
        }
    </script>
@endsection
