@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Subkomisi</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Cari Subkomisi" aria-label="Search"
                        aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">Cari</button>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper">
                    <button type="button" class="btn btn-primary btn-sm" onclick="addSubkomisi()">
                        <i class="fa-solid fa-plus"></i> Tambah Subkomisi
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
                            <th>Nama Subkomisi</th>
                            <th>Komisi</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>Ketua Tim Penyensoran</td>
                            <td>Sekretariat</td>
                            <td class="aksi">
                                <button type="button" class="btn btn-warning btn-sm" onclick="editSubkomisi()">
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

    <div class="modal fade" id="SubkomisiModal" tabindex="-1" aria-labelledby="SubkomisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="SubkomisiModalLabel">Tambah Daftar Subkomisi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="SubkomisiForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="subkomisi_id" name="subkomisi_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_subkomisi" placeholder="Nama Subkomisi"
                                name="nama_subkomisi" required>
                            <label for="nama_subkomisi">Nama Subkomisi</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Komisi</option>
                            <option value="">Komisi I</option>
                            <option value="2">Komisi II</option>
                            <option value="3">Komisi III</option>
                            <option value="3">Sekretariat</option>
                        </select>
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
        function addSubkomisi() {
            // Clear form
            $('#SubkomisiForm').trigger('reset');

            // Update modal title
            $('#SubkomisiModalLabel').text('Tambah Daftar Subkomisi');

            // Set form action for adding a new Subkomisi
            $('#SubkomisiForm').attr('action', '/subkomisi/store');

            // Hide the hidden ID field
            $('#subkomisi_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#SubkomisiModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editSubkomisi(id, nama, golongan) {
            // Pre-fill form with existing data
            $('#pangkat_id').val(id);
            $('#nama_pangkat').val(nama);
            $('#golongna').val(golongan);

            // Update modal title
            $('#SubkomisiModalLabel').text('Edit Daftar Subkomisi');

            // Set form action for updating Subkomisi
            $('#SubkomisiForm').attr('action', '/subkomisi/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#SubkomisiModal').modal('show');
        }
    </script>
@endsection
