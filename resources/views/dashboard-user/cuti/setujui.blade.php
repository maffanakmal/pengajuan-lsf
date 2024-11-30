@extends('dashboard-user.index')

@section('user-content')
    <div class="container mt-4">
        <div class="row text-center mb-3">
                <h6>Setujui Cuti</h6>
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
                                <h6 class="mb-0">Cuti Tahunan</h6>
                                <p class="mb-0">Muhamad Affan Akmal</p>
                                <small class="mb-0">20 September 2024</small>
                            </div>
                            <a href="{{ route('user.cuti.setujui.detail') }}" class="btn btn-primary btn-sm mt-2">Detail</a>
                        </div>
                        <div class="card-status">
                            <span class="badge bg-warning text-dark p-2">Pending</span>
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
