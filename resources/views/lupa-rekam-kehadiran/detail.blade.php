@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <a href="{{ route('lupa-rekam.pulang') }}" class="mt-3 text-decoration-none"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <div class="row mb-md-0 mb-3 mt-3"> <!-- Add mb-3 for small screens and mb-md-0 for larger screens -->
            <div class="col-md-6">
                <h5 class="mb-4">Detail Lupa Rekam Kehadiran Kepulangan Kerja</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper"> 
                    <button type="button" class="btn btn-warning btn-sm" onclick="editInformasiPribadi()">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Data
                    </button>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-file-pdf"></i> Export PDF</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                    @include('lupa-rekam-kehadiran.layout.table-lupa-rekam')
            </div>
        </div>
    </div>

    <div class="modal fade" id="InformasiPribadiModal" tabindex="-1" aria-labelledby="InformasiPribadiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="InformasiPribadiModalLabel">Tambah InformasiPribadi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="InformasiPribadiForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="informasiPribadi_id" name="informasiPribadi_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nip" placeholder="NIP"
                                name="nip" required>
                            <label for="nip">NIP</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_pegawai" placeholder="Nama Pegawai"
                                name="nama_pegawai" required>
                            <label for="nama_pegawai">Nama Pegawai</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl_lahir" placeholder="Tanggal Lahir"
                                name="tgl_lahir" required>
                            <label for="tgl_lahir">Tanggal Lahir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir"
                                name="tempat_lahir" required>
                            <label for="tempat_lahir">Tempat Lahir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat"
                                style="height: 100px" required></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="no_telepon" placeholder="Nomor Telepon"
                                name="no_telepon" required>
                            <label for="no_telepon">Nomor Telepon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="Email"
                                name="email" required>
                            <label for="email">Email</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Jabatan</option>
                            <option value="">Admin</option>
                            <option value="2">Tenaga Sensor</option>
                        </select>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Subkomisi</option>
                            <option value="">Penyensoran</option>
                            <option value="2">Sekretariat</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl_mulaiKerja" placeholder="Tanggal Mulai Kerja"
                                name="tgl_mulaiKerja" required>
                            <label for="tgl_mulaiKerja">Tanggal Mulai Kerja</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Status Pegawai</option>
                            <option value="">PNS</option>
                            <option value="2">PPNPN</option>
                            <option value="2">Tenaga Sensor</option>
                        </select>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Pangkat</option>
                            <option value="">PNS</option>
                            <option value="2">PPNPN</option>
                            <option value="2">Tenaga Sensor</option>
                        </select>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Unit Kerja</option>
                            <option value="">PNS</option>
                            <option value="2">PPNPN</option>
                            <option value="2">Tenaga Sensor</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="npwp" placeholder="NPWP"
                                name="npwp" required>
                            <label for="npwp">NPWP</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nik" placeholder="NIK"
                                name="nik" required>
                            <label for="nik">NIK</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Status Pernikahan</option>
                            <option value="">Menikah</option>
                            <option value="2">Lajang</option>
                            <option value="2">Janda</option>
                            <option value="2">Duda</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="noKK" placeholder="Nomor Kartu Keluarga"
                                name="noKK" required>
                            <label for="noKK">Nomor Kartu Keluarga</label>
                        </div>
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
        // Function to handle "Edit Jabatan" button
        function editInformasiPribadi(id, nama, deskripsi) {
            // Pre-fill form with existing data
            $('#department_id').val(id);
            $('#nama_department').val(nama);
            $('#deskripsi').val(deskripsi);

            // Update modal title
            $('#InformasiPribadiModalLabel').text('Edit Informasi Pribadi');

            // Set form action for updating InformasiPribadi
            $('#InformasiPribadiForm').attr('action', '/informasipribadi/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#InformasiPribadiModal').modal('show');
        }
    </script>
@endsection
