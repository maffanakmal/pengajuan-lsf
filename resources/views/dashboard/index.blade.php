@extends('dashboard.layouts.main')

@section('dashboard-content')
<div class="container mt-4">
    <div class="row">
        <h4 class="mb-4">Dashboard</h4>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Komisi I
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                        <small>Karyawan</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Komisi II
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                        <small>Karyawan</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Komisi III
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                        <small>Karyawan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row w-25 mb-3">
        <h5>Data Tahun</h5>
        <div class="container">
            <select class="form-select" id="yearSelect" aria-label="Default select example">
                
            </select>
        </div>
    </div>
    <div class="row">
        <h6 class="mb-3">Cuti</h6>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Pending
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Disetujui
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Ditolak
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h6 class="mb-3">Izin</h6>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Pending
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Disetujui
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Ditolak
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h6 class="mb-3">Lupa Rekam Kehadiran</h6>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Kedatangan
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card">
                <div class="card-body">
                    Kepulangan
                    <div class="card-info">
                        <h3 class="mb-0">104</h3>
                    </div>
                </div>
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
