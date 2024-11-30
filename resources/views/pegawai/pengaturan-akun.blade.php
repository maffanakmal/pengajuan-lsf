@extends('pegawai.layouts.detail')

@section('detail-content')
    <div class="container mt-4">
        <div class="row mb-md-0 mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Pengaturan Akun</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper">
                    <button type="button" class="btn btn-primary btn-sm" onclick="addAkun()">
                        <i class="fa-solid fa-plus"></i> Tambah Akun
                    </button>
                    <button type="button" class="btn btn-warning btn-sm" onclick="editAkun()">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Akun
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table table-informasi">
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td>: 912031293</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>: 12345</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>: Admin</td>
                    </tr>
                    <tr>
                        <td>Last Login</td>
                        <td>: 20:55, 09/10/2024</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: Aktif</td>
                    </tr>
                </tbody>
            </table>       
        </div>
    </div>

    <div class="modal fade" id="AkunModal" tabindex="-1" aria-labelledby="AkunModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="AkunModalLabel">Tambah Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="AkunForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="akun_id" name="akun_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" placeholder="Username"
                                name="username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="passoword" placeholder="Passoword"
                                name="passoword" required>
                            <label for="passoword">Password</label>
                        </div>
                        <select class="form-select mb-3">
                            <option selected>Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Manager</option>
                            <option value="3">Pegawai</option>
                          </select>
                        <select class="form-select">
                            <option selected>Status</option>
                            <option value="1">Aktif</option>
                            <option value="2">Tidak Aktif</option>
                            <option value="3">Dinonaktifkan</option>
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
        function addAkun() {
            // Clear form
            $('#AkunForm').trigger('reset');

            // Update modal title
            $('#AkunModalLabel').text('Tambah Akun');

            // Set form action for adding a new Akun
            $('#AkunForm').attr('action', '/Akun/store');

            // Hide the hidden ID field
            $('#akun_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#AkunModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editAkun(id, nama, deskripsi) {
            // Pre-fill form with existing data
            $('#department_id').val(id);
            $('#nama_department').val(nama);
            $('#deskripsi').val(deskripsi);

            // Update modal title
            $('#AkunModalLabel').text('Edit Akun');

            // Set form action for updating Akun
            $('#AkunForm').attr('action', '/akun/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#AkunModal').modal('show');
        }
    </script>
@endsection
