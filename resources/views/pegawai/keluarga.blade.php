@extends('pegawai.layouts.detail')

@section('detail-content')
    <div class="container mt-4">
        <div class="row mb-md-0 mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Keluarga</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper">
                    <button type="button" class="btn btn-primary btn-sm" onclick="addKeluarga()">
                        <i class="fa-solid fa-plus"></i> Tambah Keluarga
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
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Hubungan Keluarga</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
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
                            <td>Affan</td>
                            <td>Peserta</td>
                            <td>0812381283</td>
                            <td>affan@gmail.com</td>
                            <td>jl. sektor 11</td>
                            <td class="aksi">
                                <button type="button" class="btn btn-warning btn-sm" onclick="editKeluarga()">
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

    <div class="modal fade" id="KeluargaModal" tabindex="-1" aria-labelledby="KeluargaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="KeluargaModalLabel">Tambah Keluarga</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="KeluargaForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="keluarga_id" name="keluarga_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik"
                                required>
                            <label for="nik">NIK</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap"
                                name="nama_lengkap" required>
                            <label for="nama_lengkap">Nama Lengkap</label>
                        </div>
                        <select class="form-select mb-3">
                            <option selected disabled>Hubungan Keluarga</option>
                            <option value="1">Suami</option>
                            <option value="2">Istri</option>
                            <option value="2">Anak</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nomor_telepon" placeholder="Nomor Telepon"
                                name="nomor_telepon" required>
                            <label for="nomor_telepon">Nomor Telepon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                                required>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alamat" id="alamat" style="height: 100px"></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" form="jabatanForm" class="btn btn-primary btn-sm" id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to handle "Add Jabatan" button
        function addKeluarga() {
            // Clear form
            $('#KeluargaForm').trigger('reset');

            // Update modal title
            $('#KeluargaModalLabel').text('Tambah Keluarga');

            // Set form action for adding a new Keluarga
            $('#KeluargaForm').attr('action', '/keluarga/store');

            // Hide the hidden ID field
            $('#keluarga_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#KeluargaModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editKeluarga(id, nama, deskripsi) {
            // Pre-fill form with existing data
            $('#department_id').val(id);
            $('#nama_department').val(nama);
            $('#deskripsi').val(deskripsi);

            // Update modal title
            $('#KeluargaModalLabel').text('Edit Keluarga');

            // Set form action for updating Keluarga
            $('#KeluargaForm').attr('action', '/keluarga/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#KeluargaModal').modal('show');
        }
    </script>
@endsection
