<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/fontawesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/unicode.css") }}">
    <link rel="stylesheet" href="{{ asset("css/header.css") }}">
    @yield('css')
</head>
<body>
    @include('layouts/navbar')

    @yield('content')

    @include('layouts/footer')

    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('script_src')

    <script>
        const up = document.querySelector("#up");
        const navbar = document.querySelector("#navbar");

        up.addEventListener("click", function() {
          window.scrollTo(0, 0)
        })
        window.onscroll = function() {
          if (window.scrollY > 420) {
            up.style.display = "block"
          } else {
            up.style.display = "none"
          }
        }

        @yield("script")
    </script>
    
</body>
</html>