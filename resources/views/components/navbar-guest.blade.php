<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
            <i class="bi bi-egg-fried"></i> EJOY
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#premium-dish">Premium Dish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Fitur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang</a>
                </li>
            </ul>

            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
                <a class="nav-link" href="{{ route('register') }}">
                    <i class="bi bi-person-plus"></i> Register
                </a>
            </div>
        </div>
    </div>
</nav>
