<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('user.common.head')
</head>
<body>
    <div class="container-scroller">
        @include('user.common.header')
                <div class="container-fluid page-body-wrapper">
                    @include('user.common.side_navbar')
                    <div class="main-panel">
                        @yield('content')
                        @include('user.common.footer')
                    </div>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>
