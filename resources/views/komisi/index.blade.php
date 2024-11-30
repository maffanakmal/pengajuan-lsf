@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Komisi</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="Cari Komisi" aria-label="Search"
                        aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">Cari</button>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper">
                    <button type="button" class="btn btn-primary btn-sm" onclick="addKomisi()">
                        <i class="fa-solid fa-plus"></i> Tambah Komisi
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
                            <th>Nama Komisi</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>Komisi I</td>
                            <td class="aksi">
                                <button type="button" class="btn btn-warning btn-sm"
                                    onclick="editKomisi()">
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

    <div class="modal fade" id="KomisiModal" tabindex="-1" aria-labelledby="KomisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="KomisiModalLabel">Tambah Daftar Komisi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="KomisiForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="komisi_id" name="komisi_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_komisi" placeholder="Nama Komisi"
                                name="nama_komisi" required>
                            <label for="nama_komisi">Nama Komisi</label>
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
        function addKomisi() {
            // Clear form
            $('#KomisiForm').trigger('reset');

            // Update modal title
            $('#KomisiModalLabel').text('Tambah Daftar Komisi');

            // Set form action for adding a new Komisi
            $('#KomisiForm').attr('action', '/komisi/store');

            // Hide the hidden ID field
            $('#komisi_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#KomisiModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editKomisi(id, nama, golongan) {
            // Pre-fill form with existing data
            $('#pangkat_id').val(id);
            $('#nama_pangkat').val(nama);
            $('#golongna').val(golongan);

            // Update modal title
            $('#KomisiModalLabel').text('Edit Daftar Komisi');

            // Set form action for updating Komisi
            $('#KomisiForm').attr('action', '/komisi/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#KomisiModal').modal('show');
        }
    </script>
@endsection
