@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Jabatan</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('jabatan.index') }}" method="GET">
                    @csrf
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" name="search" id="searchInput" placeholder="Nama Jabatan"
                            value="{{ request('search') }}" aria-label="Search" aria-describedby="search"
                            autocomplete="off">
                        <button class="btn btn-primary" type="submit" id="searchBtn">
                            <span id="searchIcon">{{ request('search') ? 'Hapus' : 'Cari' }}</span>
                        </button>
                    </div>
                </form>         
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper">
                    <button type="button" class="btn btn-primary btn-sm" onclick="addJabatan()">
                        <i class="fa-solid fa-plus"></i> Tambah Jabatan
                    </button>
                </div>
            </div>
        </div>
        {{-- Pesan Error --}}
        @if (session()->has('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: "Success!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                });
            </script>
        @elseif (session()->has('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: "Error!",
                        text: "{{ session('error') }}",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                });
            </script>
        @endif
        <div class="row">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="th-number">No</th>
                            <th>Nama Jabatan</th>
                            <th>Deskripsi Jabatan</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataJabatan as $index => $jabatan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                                <td>{{ $jabatan->deskripsi_jabatan }}</td>
                                <td class="aksi d-flex flex-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm"
                                        onclick="editJabatan({{ $jabatan->jabatan_id }}, '{{ $jabatan->nama_jabatan }}', '{{ $jabatan->deskripsi_jabatan }}')">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deleteJabatan({{ $jabatan->jabatan_id }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="JabatanModal" tabindex="-1" aria-labelledby="JabatanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="JabatanModalLabel">Tambah Daftar Jabatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="JabatanForm" action="{{ route('jabatan.storeOrUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" id="jabatan_id" name="jabatan_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror"
                                id="nama_jabatan" name="nama_jabatan" placeholder="Nama Jabatan" required>
                            <label for="nama_jabatan">Nama Jabatan</label>
                            @error('nama_jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('deskripsi_jabatan') is-invalid @enderror"
                                id="deskripsi_jabatan" name="deskripsi_jabatan" placeholder="Deskripsi Jabatan" required>
                            <label for="deskripsi_jabatan">Deskripsi Jabatan</label>
                            @error('deskripsi_jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" form="JabatanForm" class="btn btn-primary btn-sm" id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Function to handle "Add Jabatan" button
        function addJabatan() {
            // Reset form and modal for adding
            $('#JabatanForm').trigger('reset');
            $('#jabatan_id').val('');
            $('#JabatanModalLabel').text('Tambah Daftar Jabatan');
            $('#saveButton').text('Simpan');
            $('#JabatanModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editJabatan(jabatan_id, nama_jabatan, deskripsi_jabatan) {
            // Pre-fill form for editing
            $('#jabatan_id').val(jabatan_id);
            $('#nama_jabatan').val(nama_jabatan);
            $('#deskripsi_jabatan').val(deskripsi_jabatan);
            $('#JabatanModalLabel').text('Edit Daftar Jabatan');
            $('#saveButton').text('Simpan');
            $('#JabatanModal').modal('show');
        }

        function deleteJabatan(jabatan_id) {
            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Menghapus data secara permanen",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the delete action by redirecting to the destroy route
                    window.location.href = '/dashboard/master/jabatan/destroy/' + jabatan_id;
                }
            });
        }
    </script>
@endsection
