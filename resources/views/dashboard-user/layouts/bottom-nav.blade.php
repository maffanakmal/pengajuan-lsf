<header class="navbar fixed-bottom bg-primary shadow-lg" data-bs-theme="dark"> 
    <div class="container d-flex justify-content-around">
        <div class="navbar-item text-center">
            <a href="{{ route('user.home') }}" class="btn btn-sm">
                <i class="fa-solid fa-house"></i>
                <p class="mb-0">Home</p>
            </a>
        </div>
        <div class="navbar-item text-center dropup">
            <a href="#" class="btn btn-sm" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative; padding-right: 1rem;">
                <i class="fa-solid fa-calendar-check"></i>
                <p class="mb-0">Cuti</p>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('user.cuti.index') }}">Cuti</a></li>
                <li><a class="dropdown-item" href="{{ route('user.cuti.setujui') }}">Setujui Cuti</a></li>
            </ul>
        </div>        
        <div class="navbar-item text-center dropup">
            <a href="#" class="btn btn-sm" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative; padding-right: 1rem;">
                <i class="fa-solid fa-clock"></i>
                <p class="mb-0">Izin</p>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('user.izin.index') }}">Izin</a></li>
                <li><a class="dropdown-item" href="{{ route('user.izin.setujui') }}">Setujui Izin</a></li>
            </ul>
        </div>  
        <div class="navbar-item text-center">
            <a class="btn btn-sm" href="{{ route('user.lupa-rekam.index') }}">
                <i class="fa-solid fa-fingerprint"></i>
                <p class="mb-0"> Lupa Rekam</p>
            </a>
        </div>
    </div>
</header>
