@extends('dashboard.layouts.main')

@section('dashboard-content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h5 class="mb-4">Daftar Izin Pulang Cepat</h5>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarProfile" aria-controls="navbarProfile" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarProfile">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm mx-2" href="{{ route('izin.pulang.pending') }}">
                                Pending
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm mx-2" href="{{ route('izin.pulang.pending.disetujui') }}">
                                Disetujui
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm mx-2" href="{{ route('izin.pulang.pending.ditolak') }}">
                                Ditolak
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>                
        </div>
    </div>
    <div class="container">
        @yield('pulang-content')
    </div>
@endsection
