@extends('dashboard.layouts.main')

@section('dashboard-content')
    <div class="container mt-4">
        <h4>Pengaturan Akun</h4>
        <hr>
        <div class="row">
            @yield('profile-container')
        </div>
    </div>
@endsection
