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
                <form action="{{ route('komisi.index') }}" method="GET">
                    @csrf
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" name="search" id="searchInput" placeholder="Nama Komisi"
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
                    <button type="button" class="btn btn-primary btn-sm" onclick="addKomisi()">
                        <i class="fa-solid fa-plus"></i> Tambah Komisi
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
                            <th>Nama Komisi</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKomisi as $index => $komisi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $komisi->nama_komisi }}</td>
                                <td class="aksi d-flex flex-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm"
                                        onclick="editKomisi({{ $komisi->komisi_id }}, '{{ $komisi->nama_komisi }}')">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deleteKomisi({{ $komisi->komisi_id }})">
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

    <div class="modal fade" id="KomisiModal" tabindex="-1" aria-labelledby="KomisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="KomisiModalLabel">Tambah Daftar Komisi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="KomisiForm" action="{{ route('komisi.storeOrUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" id="komisi_id" name="komisi_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_komisi') is-invalid @enderror"
                                id="nama_komisi" name="nama_komisi" placeholder="Nama Komisi" required>
                            <label for="nama_komisi">Nama Komisi</label>
                            @error('nama_komisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" form="KomisiForm" class="btn btn-primary btn-sm" id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Function to handle "Add Jabatan" button
        function addKomisi() {
            // Reset form and modal for adding
            $('#KomisiForm').trigger('reset');
            $('#komisi_id').val('');
            $('#KomisiModalLabel').text('Tambah Daftar Komisi');
            $('#saveButton').text('Simpan');
            $('#KomisiModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editKomisi(komisi_id, nama_komisi) {
            // Pre-fill form for editing
            $('#komisi_id').val(komisi_id);
            $('#nama_komisi').val(nama_komisi);
            $('#KomisiModalLabel').text('Edit Daftar Komisi');
            $('#saveButton').text('Komisi');
            $('#KomisiModal').modal('show');
        }

        function deleteKomisi(komisi_id) {
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
                    window.location.href = '/dashboard/master/komisi/destroy/' + komisi_id;
                }
            });
        }
    </script>
@endsection
