@extends('dashboard-user.index')

@section('user-content')
<div class="container mt-4">
    <h6 class="text-center mt-2">Selamat Datang Di Sistem Pengajuan Cuti, Izin dan Lupa Rekam Kehadiran</h6>
    <hr>
    <p class="mb-1 text-center">Data Tahun</p>
    <div class="row mx-auto w-50 mb-2">
        <div class="container">
            <select class="form-select" id="yearSelect" aria-label="Default select example">
                
            </select>
        </div>
    </div>
    <div class="row">
            <div class="col-6 p-1 col-lg-2">
                <div class="card bg-success-subtle">
                    <div class="card-body p-1 d-flex flex-column justify-content-center align-items-center">
                        <div class="card-info">
                            <h3 class="mb-0">4</h3>
                        </div>
                        <p class="mb-1">Cuti</p>
                    </div>
                </div>
            </div>
            <div class="col-6 p-1 col-lg-2">
                <div class="card bg-warning-subtle">
                    <div class="card-body p-1 d-flex flex-column justify-content-center align-items-center">
                        <div class="card-info">
                            <h3 class="mb-0">4</h3>
                        </div>
                        <p class="mb-1">Izin</p>
                    </div>
                </div>
            </div>
            <div class="col-6 p-1 col-lg-2 mb-1">
                <div class="card bg-danger-subtle">
                    <div class="card-body p-1 d-flex flex-column justify-content-center align-items-center">
                        <div class="card-info">
                            <h3 class="mb-0">4</h3>
                        </div>
                        <p class="mb-1">Lupa Rekam Kehadiran</p>
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
