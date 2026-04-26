<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-3 px-lg-4">
        <img src="{{ asset('assets/img/logo.webp') }}" alt="CarServ Logo" class="logo-img"
            style="max-height: 100px; width: 80px; border-radius: 50%; object-fit: cover;">
        <h2 class="m-0 text-primary"></i>RendiMotor</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <li class="nav-item {{ request()->is('home*') ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item {{ request()->is('service*') ? 'active' : '' }}">
                <a href="{{ route('service') }}" class="nav-link">Service</a>
            </li>
            <li class="nav-item {{ request()->is('sparepart*') ? 'active' : '' }}">
                <a href="{{ route('sparepart') }}" class="nav-link">Sparepart</a>
            </li>
            <li class="nav-item {{ request()->is('about*') ? 'active' : '' }}">
                <a href="{{ route('about') }}" class="nav-link">About</a>
            </li>
        </div>

        @guest
            <a href="{{ route('hal-login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login<i
                    class="fa fa-arrow-right ms-3"></i>
            </a>
        @endguest
        @auth
            <a href="{{ route('logout') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Logout
            </a>
        @endauth
    </div>
</nav>
