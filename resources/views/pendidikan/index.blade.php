@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Pendidikan</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="export-wrapper">
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-file-pdf"></i> Export
                        PDF</button>
                    <button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-file-excel"></i> Export
                        Excel</button>
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
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Jenjang</th>
                            <th>Universitas</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th class="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>08123123</td>
                            <td>Affan</td>
                            <td>S1</td>
                            <td>Universitas Satya Negara Indonesia</td>
                            <td>Sistem Informasi</td>
                            <td>2025</td>
                            <td class="aksi">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></a>
                                <button type="button" class="btn btn-warning btn-sm" onclick="editPendidikan()">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm"><i
                                        class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pendidikanModal" tabindex="-1" aria-labelledby="pendidikanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="pendidikanModalLabel">Tambah Daftar Pendidikan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="pendidikanForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="pendidikan_id" name="pendidikan_id">

                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected>Pilih Pegawai</option>
                            <option value="1">81291 - Muhamad</option>
                            <option value="2">12381 - Affan</option>
                            <option value="3">41321 - Akmal</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jenjang" placeholder="jenjang" name="jenjang"
                                required>
                            <label for="jenjang">Jenjang Pendidikan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="universitas" placeholder="Universitas"
                                name="universitas" required>
                            <label for="universitas">Universitas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jurusan" placeholder="Jurusan" name="jurusan"
                                required>
                            <label for="jurusan">Jurusan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tahun_lulus" placeholder="Tahun Lulus"
                                name="tahun_lulus" required>
                            <label for="tahun_lulus">Tahun Lulus</label>
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
        function addPendidikan() {
            // Clear form
            $('#pendidikanForm').trigger('reset');

            // Update modal title
            $('#pendidikanModalLabel').text('Tambah Daftar Pendidikan');

            // Set form action for adding a new pendidikan
            $('#pendidikanForm').attr('action', '/pendidikan/store');

            // Hide the hidden ID field
            $('#pendidikan_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#pendidikanModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editPendidikan(id, nama, deskripsi) {
            // Pre-fill form with existing data
            $('#department_id').val(id);
            $('#nama_department').val(nama);
            $('#deskripsi').val(deskripsi);

            // Update modal title
            $('#pendidikanModalLabel').text('Edit Daftar Pendidikan');

            // Set form action for updating pendidikan
            $('#pendidikanForm').attr('action', '/pendidikan/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#pendidikanModal').modal('show');
        }
    </script>
@endsection
