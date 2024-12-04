@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5 class="mb-4">Daftar Unit Kerja</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('unit-kerja.index') }}" method="GET">
                    @csrf
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" name="search" id="searchInput" placeholder="Nama Unit Kerja"
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
                    <button type="button" class="btn btn-primary btn-sm" onclick="addUnitkerja()">
                        <i class="fa-solid fa-plus"></i> Tambah Unit Kerja
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
                            <th>Nama Unit Kerja</th>
                            <th>Deskripsi Unit Kerja</th>
                            <th>Lokasi Unit Kerja</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataUnitkerja as $index => $unitkerja)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $unitkerja->nama_unit }}</td>
                                <td>{{ $unitkerja->deskripsi_unit }}</td>
                                <td>{{ $unitkerja->lokasi_unit }}</td>
                                <td class="aksi d-flex flex-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm"
                                        onclick="editUnitkerja({{ $unitkerja->unitkerja_id }}, '{{ $unitkerja->nama_unit }}', '{{ $unitkerja->deskripsi_unit }}', '{{ $unitkerja->lokasi_unit }}')">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deleteUnitkerja({{ $unitkerja->unitkerja_id }})">
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

    <div class="modal fade" id="UnitkerjaModal" tabindex="-1" aria-labelledby="UnitkerjaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="UnitkerjaModalLabel">Tambah Daftar Unit Kerja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="UnitkerjaForm" action="{{ route('unit-kerja.storeOrUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" id="unitkerja_id" name="unitkerja_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_unit') is-invalid @enderror"
                                id="nama_unit" name="nama_unit" placeholder="Nama Unit Kerja" required>
                            <label for="nama_unit">Nama Unit Kerja</label>
                            @error('nama_unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('deskripsi_unit') is-invalid @enderror"
                                id="deskripsi_unit" name="deskripsi_unit" placeholder="Deskripsi Unit Kerja" required>
                            <label for="deskripsi_unit">Deskripsi Unit Kerja</label>
                            @error('deskripsi_unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('lokasi_unit') is-invalid @enderror"
                                id="lokasi_unit" name="lokasi_unit" placeholder="Lokasi Unit Kerja" required>
                            <label for="lokasi_unit">Lokasi Unit Kerja</label>
                            @error('lokasi_unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" form="UnitkerjaForm" class="btn btn-primary btn-sm" id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Function to handle "Add Jabatan" button
        function addUnitkerja() {
            // Reset form and modal for adding
            $('#UnitkerjaForm').trigger('reset');
            $('#unitkerja_id').val('');
            $('#UnitkerjaModalLabel').text('Tambah Daftar Unit Kerja');
            $('#saveButton').text('Simpan');
            $('#UnitkerjaModal').modal('show');
        }

        // Function to handle "Edit Jabatan" button
        function editUnitkerja(unitkerja_id, nama_unit, deskripsi_unit, lokasi_unit) {
            // Pre-fill form for editing
            $('#unitkerja_id').val(unitkerja_id);
            $('#nama_unit').val(nama_unit);
            $('#deskripsi_unit').val(deskripsi_unit);
            $('#lokasi_unit').val(lokasi_unit);
            $('#UnitkerjaModalLabel').text('Edit Daftar Unit Kerja');
            $('#saveButton').text('Simpan');
            $('#UnitkerjaModal').modal('show');
        }

        function deleteUnitkerja(unitkerja_id) {
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
                    window.location.href = '/dashboard/master/unit-kerja/destroy/' + unitkerja_id;
                }
            });
        }
    </script>
@endsection
