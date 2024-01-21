@extends('templates.default-admin')

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                {{-- alert welcome --}}
                @if (session('success'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Welcome <b>{{ Auth::user()->name }}</b>! You have successfully logged in.
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Dashboard</h1>
                        </div>
                        {{-- alert welcome --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="widget-popular-blog-container">
                                    Selamat datang di Admin Dashboard Catalyst - Home Cleaning Service! Kami sangat senang
                                    dan antusias menyambut Anda sebagai bagian dari tim administrator di dashboard website
                                    kami. Catalyst Home Cleaning Service merupakan platform yang didedikasikan untuk
                                    memberikan layanan pembersihan rumah yang berkualitas tinggi dan penuh perhatian kepada
                                    pelanggan kami. Dengan kehadiran Anda di dalam tim, kami yakin bahwa kita dapat mencapai
                                    tingkat keunggulan yang lebih tinggi dalam memberikan pelayanan terbaik kepada pengguna
                                    kami.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        // hide alert after 2.5 seconds with slow fadeout effect
        $(".alert").delay(2500).slideUp(500, function() {
            $(this).alert('close');
        });
    </script>
@endsection
