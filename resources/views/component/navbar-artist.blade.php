<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-bottom">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav me-auto mb-lg-0">
                @auth
                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                    <a class="nav-link" href="{{route('dashboard')}}">My Dashboard</a>
                    <form class="d-flex mx-5" role="search">
                        <input class="form-control me-2 border-dark-subtle" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="d-flex mb-3 mx-3 gap-5">
                    <a class="nav-link" href="#">Song</a>
                    <a class="nav-link" href="#">Album</a>
                    <a class="nav-link" href="#">Concert</a>
                </div>
            @endauth
        </div>
    </div>
</nav>