@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <a href="/dashboard/cuti/pending" class="mt-3 text-decoration-none"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <div class="row mb-md-0 mb-3 mt-3"> <!-- Add mb-3 for small screens and mb-md-0 for larger screens -->
            <div class="col-md-6">
                <h5 class="mb-4">Detail Pengajuan Cuti</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="btn-wrapper"> 
                    <button type="button" class="btn btn-warning btn-sm" onclick="editPengajuan()">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Pengajuan Cuti
                    </button>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-file-pdf"></i> Export PDF</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                    @include('cuti.layout.table-cuti')
            </div>
        </div>
    </div>

    <div class="modal fade" id="PengajuanModal" tabindex="-1" aria-labelledby="PengajuanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="PengajuanModalLabel">Tambah Pengajuan Cuti</h1>
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
                            <option selected disabled>Pilih Jenis Cuti</option>
                            <option value="">1. Cuti Tahunan</option>
                            <option value="2">2. Cuti Besar</option>
                            <option value="2">3. Cuti Sakit</option>
                            <option value="2">4. Cuti Melahirkan</option>
                            <option value="2">5. Cuti Karena Alasan Penting</option>
                            <option value="2">6. Cuti di Luar Tanggungan Negara</option>
                        </select>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alasan" id="alasan" name="alasan"
                                style="height: 100px" required></textarea>
                            <label for="alasan">Alasan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="selama" placeholder="Selama"
                                name="selama" required>
                            <label for="selama">Selama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl_mulai" placeholder="Tanggal Mulai"
                                name="tgl_mulai" required>
                            <label for="tgl_mulai">Tanggal Mulai</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="tgl_berakhir" placeholder="Tanggal Berakhir"
                                name="tgl_berakhir" required>
                            <label for="tgl_berakhir">Tanggal Berakhir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tahun_cuti" placeholder="Tahun Cuti"
                                name="tahun_cuti" required>
                            <label for="tahun_cuti">Tahun Cuti</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="sisa_cuti" placeholder="Sisa Cuti"
                                name="sisa_cuti" required>
                            <label for="sisa_cuti">Sisa Cuti</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Keterangan Cuti" id="keterangan_cuti" name="keterangan_cuti"
                                style="height: 100px" required></textarea>
                            <label for="keterangan_cuti">Keterangan Cuti</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alamat Selama Menjalankan Cuti" id="alamat" name="alamat"
                                style="height: 100px" required></textarea>
                            <label for="alamat">Alamat Selama Menjalankan Cuti</label>
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
        // Function to handle "Edit Jabatan" button
        function editPengajuan(id, nama, deskripsi) {
            // Pre-fill form with existing data
            $('#department_id').val(id);
            $('#nama_department').val(nama);
            $('#deskripsi').val(deskripsi);

            // Update modal title
            $('#PengajuanModalLabel').text('Edit Informasi Pribadi');

            // Set form action for updating Pengajuan
            $('#PengajuanForm').attr('action', '/pengajuan/update/' + id);

            // Update button text
            $('#saveButton').text('Update');

            // Show modal
            $('#PengajuanModal').modal('show');
        }
    </script>
@endsection
