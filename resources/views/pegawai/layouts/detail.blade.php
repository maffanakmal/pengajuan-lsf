@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container">
        <div class="row">
            <a href="/dashboard/pegawai" class="mt-3 text-decoration-none"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            <h5 class="mt-3 mb-0">Data </h5>
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarProfile" aria-controls="navbarProfile" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarProfile">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pegawai.informasi-pribadi') }}">
                                <button class="btn btn-primary btn-sm rounded-5 px-3">Informasi Pribadi</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pegawai.pendidikan') }}">
                                <button class="btn btn-primary btn-sm rounded-5 px-3">Pendidikan</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pegawai.keluarga') }}">
                                <button class="btn btn-primary btn-sm rounded-5 px-3">Keluarga</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pegawai.jaminan') }}">
                                <button class="btn btn-primary btn-sm rounded-5 px-3">Jaminan</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pegawai.pengaturan-akun') }}">
                                <button class="btn btn-primary btn-sm rounded-5 px-3">Pengaturan Akun</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <hr>
            <div class="container">
                @yield('detail-content')
            </div>
        </div>
    </div>
@endsection