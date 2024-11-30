<nav class="navbar navbar-expand-lg fixed-top navbar-primary bg-primary shadow-sm">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between w-100">
            <!-- Profile Information -->
            <div class="profile-info">
                <p class="text-white mb-0">Muhamad Affan Akmal</p>
                <small class="mt-0 text-white">Kepala Subbagian</small>
            </div>
            <!-- Profile Dropdown -->
            <div class="dropdown">
                <a
                    href="#"
                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="profileDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <img
                        src="{{ asset('img/profile.png') }}"
                        alt="Profile Image"
                        class="rounded-circle"
                        style="width: 42px; height: 42px; object-fit: cover;"
                    >
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item" href="/settings">
                            <i class="bi bi-gear me-2"></i> Settings
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('landing.page') }}">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
