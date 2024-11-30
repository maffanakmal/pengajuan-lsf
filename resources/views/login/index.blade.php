@extends('main')

@section('container')
<div class="row d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 col-lg-4 mx-auto">
        <h3 class="fw-normal text-center">Selamat Datang di Sistem Pengajuan Cuti, Izin dan Lupa Rekam Absen</h3>
        <div class="form-signin w-100 m-auto p-3 p-md-4">
            <div class="header-wrapper">
            </div>
            <form action="/login" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                        placeholder="NIP" name="nip" required value="{{ old('nip') }}">
                    <label for="nip">NIP</label>
                </div>
                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control" id="password">
                    <label for="password">Password</label>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword()" style="cursor: pointer;">
                        <i class="fa-solid fa-eye" id="toggleIcon"></i>
                    </span>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Masuk</button>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
    const passwordField = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('fa-solid', 'fa-eye');
            toggleIcon.classList.add('fa-solid', 'fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('fa-solid', 'fa-eye-slash');
            toggleIcon.classList.add('fa-solid', 'fa-eye');
        }
    }
</script>
@endsection
