<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('metatags')

    <title>@yield('title')</title>

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/fontawesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/unicode.css") }}">
    <link rel="stylesheet" href="{{ asset("css/header.css") }}">
    @yield('css')

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">

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
    </script>
    @yield("script")
</body>
</html>