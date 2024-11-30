@extends('profile.main')

@section('profile-container')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6"> 
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" value="maffanakmal26" readonly>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" value="maffanakmal@gmail.com" readonly>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control" id="password" value="14045" readonly>
                    <label for="password">Password</label>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword()" style="cursor: pointer;">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
            </div>
            <div class="btn-save">
                <button type="button" class="btn btn-warning btn-save">Ubah</button>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }
    </script>
@endsection
