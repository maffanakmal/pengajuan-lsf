@extends('pegawai.layouts.detail')

@section('detail-content')
    <div class="container mt-4">
        <div class="row mb-md-0 mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Pendidikan</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper">
                    <button type="button" class="btn btn-primary btn-sm" onclick="addPendidikan()">
                        <i class="fa-solid fa-plus"></i> Tambah Pendidikan
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
                            <th>Jenjang</th>
                            <th>Universitas</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>S-1</td>
                            <td>USNI</td>
                            <td>Sistem Informasi</td>
                            <td>2025</td>
                            <td class="aksi">
                                <button type="button" class="btn btn-warning btn-sm"
                                    onclick="editPendidikan()">
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

    <div class="modal fade" id="PendidikanModal" tabindex="-1" aria-labelledby="PendidikanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PendidikanModalLabel">Tambah Pendidikan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="PendidikanForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="pendidikan_id" name="pendidikan_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jenjang" placeholder="Jenjang"
                                name="jenjang" required>
                            <label for="jenjang">Jenjang</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="universitas" placeholder="Universitas"
                                name="universitas" required>
                            <label for="universitas">Universitas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jurusan" placeholder="Jurusan"
                                name="jurusan" required>
                            <label for="jurusan">Jurusan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tahun-lulus" placeholder="Tahun Lulus"
                                name="tahun-lulus" required>
                            <label for="tahun-lulus">Tahun Lulus</label>
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
        function addPendidikan() {
            // Clear form
            $('#PendidikanForm').trigger('reset');

            // Update modal title
            $('#PendidikanModalLabel').text('Tambah Pendidikan');

            // Set form action for adding a new Pendidikan
            $('#PendidikanForm').attr('action', '/Pendidikan/store');

            // Hide the hidden ID field
            $('#pendidikan_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#PendidikanModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editPendidikan(id, nama, deskripsi) {
            // Pre-fill form with existing data
            $('#department_id').val(id);
            $('#nama_department').val(nama);
            $('#deskripsi').val(deskripsi);

            // Update modal title
            $('#PendidikanModalLabel').text('Edit Pendidikan');

            // Set form action for updating Pendidikan
            $('#PendidikanForm').attr('action', '/pendidikan/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#PendidikanModal').modal('show');
        }
    </script>
@endsection
