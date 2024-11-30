<nav class="navbar navbar-expand-md bg-primary sticky-top shadow-sm p-0" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand text-warning fw-bold" href="/">
        <img src="{{ asset('img/lsf-logo.png') }}" alt="logo-lsf" width="100px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item me-2 mb-2 mb-lg-0">
            <a class="btn btn-sm btn-light rounded-5 px-4" href="{{ route('login') }}">Masuk</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
