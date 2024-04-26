<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('admin.common.head')
</head>
<body>
    <div class="container-scroller">
        @include('admin.common.header')
                <div class="container-fluid page-body-wrapper">
                    @include('admin.common.side_navbar')
                    <div class="main-panel">
                        @yield('content')
                        @include('admin.common.footer')
                    </div>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>
