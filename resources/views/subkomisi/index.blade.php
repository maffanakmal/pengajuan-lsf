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
                <form action="{{ route('subkomisi.index') }}" method="GET">
                    @csrf
                    <div class="input-group input-group-sm mb-3">
                        <input type="text" class="form-control" name="search" id="searchInput" placeholder="Nama Subkomisi"
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
                    <button type="button" class="btn btn-primary btn-sm" onclick="addSubkomisi()">
                        <i class="fa-solid fa-plus"></i> Tambah Subkomisi
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
                            <th>Nama Subkomisi</th>
                            <th>Nama Komisi</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSubkomisi as $index => $subkomisi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $subkomisi->nama_subkomisi }}</td>
                                <td>{{ $subkomisi->komisi->nama_komisi }}</td>
                                <td class="aksi d-flex flex-row gap-2">
                                    <button type="button" class="btn btn-warning btn-sm"
                                        onclick="editSubkomisi({{ $subkomisi->subkomisi_id }}, '{{ $subkomisi->nama_subkomisi }}')">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="deleteSubkomisi({{ $subkomisi->subkomisi_id }})">
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

    <div class="modal fade" id="SubkomisiModal" tabindex="-1" aria-labelledby="SubkomisiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="SubkomisiModalLabel">Tambah Daftar Subkomisi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="SubkomisiForm" action="{{ route('subkomisi.storeOrUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" id="subkomisi_id" name="subkomisi_id">
                    
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_subkomisi') is-invalid @enderror" id="nama_subkomisi" name="nama_subkomisi" placeholder="Nama Subkomisi" value="{{ old('nama_subkomisi') }}" required>
                            <label for="nama_subkomisi">Nama Subkomisi</label>
                            @error('nama_subkomisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <select class="form-select mb-3 @error('komisi_id') is-invalid @enderror" name="komisi_id" required>
                            <option selected disabled>Pilih Komisi</option>
                            @foreach ($komisiList as $komisi)
                                <option value="{{ $komisi->komisi_id }}" {{ old('komisi_id', $subkomisi->komisi_id ?? '') == $komisi->komisi_id ? 'selected' : '' }}>
                                    {{ $komisi->nama_komisi }}
                                </option>
                            @endforeach
                        </select>
                        @error('komisi_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </form>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" form="SubkomisiForm" class="btn btn-primary btn-sm" id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Function to handle "Add Subkomisi" button
        function addSubkomisi() {
            // Reset form and modal for adding
            $('#SubkomisiForm').trigger('reset');
            $('#subkomisi_id').val('');
            $('#SubkomisiModalLabel').text('Tambah Daftar Subkomisi');
            $('#saveButton').text('Simpan');
            $('#SubkomisiModal').modal('show');
        }

        // Function to handle "Edit Subkomisi" button
        function editSubkomisi(subkomisi_id, nama_subkomisi, komisi_id) {
            // Pre-fill form for editing
            $('#subkomisi_id').val(subkomisi_id);
            $('#nama_subkomisi').val(nama_subkomisi);
            $('#komisi_id').val(komisi_id);
            $('#SubkomisiModalLabel').text('Edit Daftar Subkomisi');
            $('#saveButton').text('Ubah');
            $('#SubkomisiModal').modal('show');
        }


        function deleteSubkomisi(subkomisi_id) {
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
                    window.location.href = '/dashboard/master/subkomisi/destroy/' + subkomisi_id;
                }
            });
        }
    </script>
@endsection
