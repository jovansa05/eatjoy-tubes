<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('dashboard.user') }}">
            <i class="bi bi-egg-fried"></i> EJOY
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard.user') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#premium-dish">Premium Dish</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#daily-planner">Daily Planner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subscription.plans') }}">Subscription</a>
                </li>
            </ul>

            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->nickname }}
                        @if(Auth::user()->isPremium())
                        <span class="badge bg-warning ms-1">Premium</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#profile"><i class="bi bi-person"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#settings"><i class="bi bi-gear"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
