@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Pegawai</h5>
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
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper">
                    <button type="button" class="btn btn-primary btn-sm" onclick="addUnitKerja()">
                        <i class="fa-solid fa-plus"></i> Tambah Pegawai
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Deskripsi</th>
                            <th class="aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kesehatan</td>
                            <td>Affan</td>
                            <td class="aksi">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></a>
                                <button type="button" class="btn btn-warning btn-sm"
                                    onclick="editUnitKerja()">
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

    <div class="modal fade" id="unitKerjaModal" tabindex="-1" aria-labelledby="unitKerjaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="unitKerjaModalLabel">Tambah Daftar Unit Kerja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="unitKerjaForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="unitKerja_id" name="unitKerja_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_unitKerja" placeholder="Nama unitKerja"
                                name="nama_unitKerja" required>
                            <label for="nama_unitKerja">Nama Unit Kerja</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="deskripsi" placeholder="Deskripsi"
                                name="deskripsi" required>
                            <label for="deskripsi">Deskripsi</label>
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
        function addUnitKerja() {
            // Clear form
            $('#unitKerjaForm').trigger('reset');

            // Update modal title
            $('#unitKerjaModalLabel').text('Tambah Daftar Unit Kerja');

            // Set form action for adding a new unitKerja
            $('#unitKerjaForm').attr('action', '/unitKerja/store');

            // Hide the hidden ID field
            $('#unitKerja_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#unitKerjaModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editUnitKerja(id, nama, deskripsi) {
            // Pre-fill form with existing data
            $('#department_id').val(id);
            $('#nama_department').val(nama);
            $('#deskripsi').val(deskripsi);

            // Update modal title
            $('#unitKerjaModalLabel').text('Edit Daftar Unit Kerja');

            // Set form action for updating unitKerja
            $('#unitKerjaForm').attr('action', '/unitKerja/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#unitKerjaModal').modal('show');
        }
    </script>
@endsection
