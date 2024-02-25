<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('user_profile', \Auth::user()->id)}}">Profile</a></li>
                    @if(!\Auth::user()->is_artist)
                        <li class="nav-item"><a class="nav-link" href="{{route('register_artist')}}">Be part of the artists</a></li>
                    @endif
                    @if(\Auth::user()->is_artist)
                        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">My Dashboard</a></li>
                    @endif
                @endauth
            </ul>
        </div>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>