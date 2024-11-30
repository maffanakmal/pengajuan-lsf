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
                    <button type="button" class="btn btn-primary btn-sm" onclick="addPegawai()">
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
                            <th class="th-number">No</th>
                            <th>Nomor Induk Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>Jabatan</th>
                            <th>Pangkat</th>
                            <th class="th-aksi">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomor = 1;
                        @endphp
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>91231238</td>
                            <td>Muhamad Affan Akmal</td>
                            <td>Biro Kepegawaian</td>
                            <td>Administrator</td>
                            <td>Penata Muda - III/a</td>
                            <td class="aksi">
                                <a href="{{ route('pegawai.informasi-pribadi') }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="PegawaiModal" tabindex="-1" aria-labelledby="PegawaiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PegawaiModalLabel">Tambah Daftar Unit Kerja</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="PegawaiForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="pegawai_id" name="pegawai_id">

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
                    <button type="submit" form="jabatanForm" class="btn btn-primary btn-sm"
                        id="saveButton">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to handle "Add Jabatan" button
        function addPegawai() {
            // Clear form
            $('#PegawaiForm').trigger('reset');

            // Update modal title
            $('#PegawaiModalLabel').text('Tambah Daftar Pegawai');

            // Set form action for adding a new Pegawai
            $('#PegawaiForm').attr('action', '/pegawai/store');

            // Hide the hidden ID field
            $('#pegawai_id').val('');

            // Update button text
            $('#saveButton').text('Simpan');

            // Show modal
            $('#PegawaiModal').modal('show');
        }
    </script>
@endsection
