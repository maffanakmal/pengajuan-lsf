<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="d-flex flex-column h-100 pt-4">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/master') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('dashboard/master/*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#masterdata" aria-expanded="false" aria-controls="masterdata">
                    <i class="fa-solid fa-database"></i>
                    <span class="ms-2">Master Data</span>
                    <i class="fa-solid fa-caret-down ms-auto rotate"></i>
                </a>

                <div class="sub-menu collapse" id="masterdata">
                    <a class="nav-link {{ Request::is('dashboard/master/komisi') ? 'active' : '' }}" href="{{ route('komisi.index') }}">Komisi</a>
                    <a class="nav-link {{ Request::is('dashboard/master/subkomisi') ? 'active' : '' }}" href="{{ route('subkomisi.index') }}">Subkomisi</a>
                    <a class="nav-link {{ Request::is('dashboard/master/pangkat') ? 'active' : '' }}" href="{{ route('pangkat.index') }}">Pangkat</a>
                    <a class="nav-link {{ Request::is('dashboard/master/jabatan') ? 'active' : '' }}" href="{{ route('jabatan.index') }}">Jabatan</a>
                    <a class="nav-link {{ Request::is('dashboard/master/unitkerja') ? 'active' : '' }}" href="{{ route('unit-kerja.index') }}">Unit Kerja</a>
                </div>
            </li>
            <a class="nav-link {{ Request::is('dashboard/pegawai') || Request::is('dashboard/pegawai/detail/*') ? 'active' : '' }}"
                href="{{ route('pegawai.index') }}">
                <i class="fa-solid fa-person"></i>
                Pegawai
            </a>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('dashboard/cuti/*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#cuti" aria-expanded="false" aria-controls="cuti">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span class="ms-2">Cuti</span>
                    <i class="fa-solid fa-caret-down ms-auto rotate"></i>
                </a>

                <div class="sub-menu collapse" id="cuti">
                    <a class="nav-link {{ Request::is('dashboard/cuti/pengajuan') ? 'active' : '' }}" href="{{ route('cuti.pengajuan') }}">Pengajuan</a>
                    <a class="nav-link {{ Request::is('dashboard/cuti/pending') ? 'active' : '' }}" href="{{ route('cuti.pending') }}">Pending</a>
                    <a class="nav-link {{ Request::is('dashboard/cuti/disetujui') ? 'active' : '' }}" href="{{ route('cuti.disetujui') }}">Disetujui</a>
                    <a class="nav-link {{ Request::is('dashboard/cuti/ditolak') ? 'active' : '' }}" href="{{ route('cuti.ditolak') }}">Ditolak</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('dashboard/izin/*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#izin" aria-expanded="false" aria-controls="izin">
                    <i class="fa-solid fa-clock"></i>
                    <span class="ms-2">Izin</span>
                    <i class="fa-solid fa-caret-down ms-auto rotate"></i>
                </a>

                <div class="sub-menu collapse" id="izin">
                    <a class="nav-link {{ Request::is('dashboard/izin/pengajuan') ? 'active' : '' }}" href="{{ route('izin.pengajuan') }}">Pengajuan</a>
                    <a class="nav-link {{ Request::is('dashboard/izin/terlambat') ? 'active' : '' }}" href="{{ route('izin.terlambat') }}">Izin Terlambat</a>
                    <a class="nav-link {{ Request::is('dashboard/izin/pulang') ? 'active' : '' }}" href="{{ route('izin.pulang') }}">Izin Pulang Cepat</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ Request::is('dashboard/lupa-rekam/*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#lupa-rekam" aria-expanded="false" aria-controls="lupa-rekam">
                    <i class="fa-solid fa-fingerprint"></i>
                    <span class="ms-2">Lupa Rekam</span>
                    <i class="fa-solid fa-caret-down ms-auto rotate"></i>
                </a>

                <div class="sub-menu collapse" id="lupa-rekam">
                    <a class="nav-link {{ Request::is('dashboard/lupa-rekam/pengajuan') ? 'active' : '' }}" href="{{ route('lupa-rekam.pengajuan') }}">Pengajuan</a>
                    <a class="nav-link {{ Request::is('dashboard/lupa-rekam/datang') ? 'active' : '' }}" href="{{ route('lupa-rekam.datang') }}">Kehadiran</a>
                    <a class="nav-link {{ Request::is('dashboard/lupa-rekam/pulang') ? 'active' : '' }}" href="{{ route('lupa-rekam.pulang') }}">Kepulangan</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/dashboard/profiling">
                    <i class="fa-solid fa-file-lines"></i>
                    Profiling
                </a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/" id="keluar">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Keluar
                </a>
            </li>
        </ul>
        <div class="profile-wrapper p-2 bg-primary mt-auto sticky-bottom">
            <div class="d-flex align-items-center">
                <div class="profile-card d-flex align-items-center">
                    <img src="{{ asset('img/Affan.png') }}" alt="profile" width="38" height="38"
                        class="rounded" style="object-fit: cover">
                    <div class="ms-2">
                        <p class="mb-0 text-white">Muhamad Affan Akmal</p>
                        <small class="text-white">Mahasiswa</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById("keluar").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default link action
        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out of your account!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, log out!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to logout URL or execute logout function
                window.location.href = "/"; // Change this URL as needed
            }
        });
    });
</script>
