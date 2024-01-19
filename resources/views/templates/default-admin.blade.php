<!DOCTYPE html>
<html lang="en">
@include('templates.admin-partials.head')
@yield('css')
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        @include('templates.admin-partials.sidebar')
        <div class="app-container">
            @yield('content')
        </div>
    </div>

    @include('templates.admin-partials.footer')
    @yield('javascript')
</body>

<!-- Mirrored from polygons.space/neptune/source/templates/admin1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 06:23:32 GMT -->

</html>
