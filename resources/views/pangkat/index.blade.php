@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar pangkat</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('pangkat.index') }}" method="GET">
                    @csrf
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" name="search" id="searchInput" placeholder="Nama Pangkat"
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
                    <button type="button" class="btn btn-primary btn-sm" onclick="addPangkat()">
                        <i class="fa-solid fa-plus"></i> Tambah Pangkat
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
                            <th>Nama Pangkat</th>
                            <th>Golongan</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPangkat as $index => $pangkat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pangkat->nama_pangkat }}</td>
                                <td>{{ $pangkat->golongan }}</td>
                                <td class="aksi d-flex flex-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm"
                                        onclick="editPangkat({{ $pangkat->pangkat_id }}, '{{ $pangkat->nama_pangkat }}', '{{ $pangkat->golongan }}')">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deletePangkat({{ $pangkat->pangkat_id }})">
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

    <div class="modal fade" id="PangkatModal" tabindex="-1" aria-labelledby="PangkatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PangkatModalLabel">Tambah Daftar Pangkat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="PangkatForm" action="{{ route('pangkat.storeOrUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" id="pangkat_id" name="pangkat_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_pangkat') is-invalid @enderror"
                                id="nama_pangkat" name="nama_pangkat" placeholder="Nama Pangkat" required>
                            <label for="nama_pangkat">Nama Pangkat</label>
                            @error('nama_pangkat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('golongan') is-invalid @enderror"
                                id="golongan" name="golongan" placeholder="Golongan" required>
                            <label for="golongan">Golongan</label>
                            @error('golongan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" form="PangkatForm" class="btn btn-primary btn-sm" id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Function to handle "Add Jabatan" button
        function addPangkat() {
            // Reset form and modal for adding
            $('#PangkatForm').trigger('reset');
            $('#pangkat_id').val('');
            $('#PangkatModalLabel').text('Tambah Daftar Pangkat');
            $('#saveButton').text('Simpan');
            $('#PangkatModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editPangkat(pangkat_id, nama_pangkat, golongan) {
            // Pre-fill form for editing
            $('#pangkat_id').val(pangkat_id);
            $('#nama_pangkat').val(nama_pangkat);
            $('#golongan').val(golongan);
            $('#PangkatModalLabel').text('Edit Daftar Pangkat');
            $('#saveButton').text('Simpan');
            $('#PangkatModal').modal('show');
        }

        function deletePangkat(pangkat_id) {
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
                    window.location.href = '/dashboard/master/pangkat/destroy/' + pangkat_id;
                }
            });
        }
    </script>
@endsection
