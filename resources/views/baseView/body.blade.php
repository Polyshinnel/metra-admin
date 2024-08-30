<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="/js/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/js/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
</head>
<body>
@include('baseView.header')
<main class="pb-14">
    <div class="box-container">
        @yield('content')
    </div>
</main>
@include('baseView.footer')
</body>
</html>
