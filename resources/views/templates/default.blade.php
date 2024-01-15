<!doctype html>
<html class="no-js" lang="zxx">
@include('templates.partials.head')
<body>
    @include('templates.partials.preloader')
    @include('templates.partials.navbar')
    @include('templates.partials.mobile-menu')
    <main>
        @yield('content')
    </main>
    @include('templates.partials.footer')
</body>
</html>
