<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href='/css/bootstrap.min.css'>
    <link rel="stylesheet" href='/css/fontawesome.min.css'>
    <link rel="stylesheet" href='/css/unicode.css'>
    <link rel="stylesheet" href="/css/adminpanel_menu.css">
    @yield('css')
    @yield('style')
</head>
<body>

    @php
        $orders = App\Models\Order::count();
    @endphp

    <div class="row g-0">
        <div id="menu" class="col-6 col-md-2 d-none d-md-block">
            <div class="sticky-top d-flex flex-column justify-content-between" style="height: 100vh;">
                <div>
                    <h3 class="py-2 px-3 d-none d-md-block text-white text-center">Admin Panel</h3>
                    <ul class="list-group px-1 px-md-3 pt-5 pt-md-0">
                        <a href="{{ route("admin_panel") }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-list"></i>
                            {{-- <span class="d-none d-md-inline">Categories</span> --}}
                            <span class="d-inline">Categories</span>
                        </a>
                        <a href="{{ route("admin_panel.articles") }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-pen-square"></i>
                            {{-- <span class="d-none d-md-inline">Articles</span> --}}
                            <span class="d-inline">Articles</span>
                        </a>
                        <a href="{{ route("admin_panel.books") }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-book-medical"></i>
                            {{-- <span class="d-none d-md-inline">Books</span> --}}
                            <span class="d-inline">Books</span>
                        </a>
                        <a href="{{ route("admin_panel.orders") }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-cart-plus"></i>
                            {{-- <span class="d-none d-md-inline">Orders</span> --}}
                            <span class="d-inline">Orders</span>
                            <span class="badge rounded-pill bg-danger float-end">{{ $orders }}</span>
                        </a>
                        {{-- <a href="admin_panel_users.php" class="list-group-item list-group-item-action">
                            <i class="fas fa-users"></i>
                            <span class="d-none d-md-inline">Users</span>
                        </a> --}}
                    </ul>
                </div>
                <ul class="list-group px-1 px-md-3 py-3">
                    <a href="/home">go to Home Page</a>
                    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" 
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();
                    ">
                        <i class="fa fa-sign-out-alt"></i>
                        <span class="d-inline">Logout</span>
                    </a>
                    <form id='logout-form' action="{{ route('logout') }}" method="POST">
                    @csrf
                    </form>
                </ul>
            </div>
        </div>
        @yield('content')
    </div>
    
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/adminpanel_menu.js"></script>
    @yield("script")
</body>
</html>