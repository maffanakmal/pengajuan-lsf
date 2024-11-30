@extends('dashboard-user.index')

@section('user-content')
    <div class="container mt-4">
        <div class="row d-flex justify-content-between align-items-center mb-3">
            <div class="col-6">
                <h6>Pengajuan Izin</h6>
            </div>
            <div class="col-6 text-end">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#PengajuanIzin">Buat Pengajuan</button>
            </div>
        </div>
        <div class="row w-50 mb-2">
            <div class="container">
                <select class="form-select" id="yearSelect" aria-label="Default select example">
                    
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-4 mb-2">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <div class="card-info">
                            <div class="cuti-info">
                                <h6 class="mb-0">Izin Pulang Cepat</h6>
                                <small class="mb-0">20 Juni 2024</small>
                            </div>
                            <a href="/pegawai/izin/detail" class="btn btn-primary btn-sm mt-2">Detail</a>
                        </div>
                        <div class="card-status">
                            <span class="badge bg-warning text-dark p-2">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="PengajuanIzin" tabindex="-1" aria-labelledby="PengajuanIzinLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="PengajuanIzinLabel">Buat Pengajuan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Include ID for edit -->
                    <form id="PengajuanForm" action="/store" method="POST">
                        @csrf
                        <input type="hidden" id="pengajuan_id" name="pengajuan_id">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_pegawai" placeholder="Nama Pegawai"
                                name="nama_pegawai" required disabled>
                            <label for="nama_pegawai">Nama Pegawai</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nip" placeholder="NIP"
                                name="nip" required disabled>
                            <label for="nip">NIP</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pangkat" placeholder="Pangkat/Gol"
                                name="pangkat" required disabled>
                            <label for="pangkat">Pangkat/Gol</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="jabatan" placeholder="Jabatan"
                                name="jabatan" required disabled>
                            <label for="jabatan">Jabatan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="unit_kerja" placeholder="Unit Kerja"
                                name="unit_kerja" required disabled>
                            <label for="unit_kerja">Unit Kerja</label>
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected disabled>Pilih Jenis Izin</option>
                            <option value="2">Izin Pulang Lebih Cepat Dari Waktu Kepulangan Kerja</option>
                            <option value="">Izin Terlambat Datang Masuk Kerja</option>
                        </select>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="selama" placeholder="Selama"
                                name="selama" required>
                            <label for="selama">Selama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl_izin" placeholder="Tanggal Izin"
                            name="tgl_izin" required>
                            <label for="tgl_izin">Tanggal Izin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alasan" id="alasan" name="alasan"
                                style="height: 100px" required></textarea>
                            <label for="alasan">Alasan</label>
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
        // Get the current year
        const currentYear = new Date().getFullYear();
    
        // Get the select element
        const yearSelect = document.getElementById("yearSelect");
    
        // Populate the select options
        for (let i = 0; i < 3; i++) {
            const option = document.createElement("option");
            option.value = currentYear - i; // Set the value
            option.textContent = currentYear - i; // Set the display text
            yearSelect.appendChild(option); // Add the option to the select
        }
    
        // Set the first option as selected
        yearSelect.selectedIndex = 0;
    </script>
@endsection
