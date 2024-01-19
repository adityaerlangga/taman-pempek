<!doctype html>
<html class="no-js" lang="zxx">
@include('templates.home-partials.head')
<body>
    @include('templates.home-partials.preloader')
    @include('templates.home-partials.navbar')
    @include('templates.home-partials.mobile-menu')
    <main>
        @yield('content')
    </main>
    @include('templates.home-partials.footer')
</body>
</html>
