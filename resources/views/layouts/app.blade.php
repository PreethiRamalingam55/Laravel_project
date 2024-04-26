<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('common.head')
</head>
<body>
    <div class="container">
         @yield('content')
    </div>
</body>
</html>
