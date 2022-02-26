<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container-fluid px-auto">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- logo -->
        <a class="navbar-brand ms-5" href="{{ route('home') }}">
            <img src="{{ asset("assets/images/logo.jpg") }}" alt="" id="logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- darkLight toggle -->
            <!-- <div class="form-check form-switch mx-5">
                <label class="form-check-label" for="flexSwitchCheckDefault">Dark Switch</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            </div> -->
            <ul class="navbar-nav mx-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#book">BOOKS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">CATEGORIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">CONTACT</a>
                </li>
                
            </ul>
            @auth
            <a class="nav-link" href="/admin-panel">Admin Panel</a>  
            @endauth
            <form class="d-flex me-3" action="{{ route('search') }}" method="GET">
                <input class="form-control rounded-pill me-2" name="query" type="search" placeholder="Search" aria-label="Search">
                {{-- <i class="fa fa-search" id="search"></i> --}}
                <button class="btn btn-outline-info" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>