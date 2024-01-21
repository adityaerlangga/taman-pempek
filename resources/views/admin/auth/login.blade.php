
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from polygons.space/neptune/source/templates/admin1/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 06:25:18 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Catalyst - Login Dashboard</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="/admin-assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin-assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="/admin-assets/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="/admin-assets/css/main.min.css" rel="stylesheet">
    <link href="/admin-assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="/admin-assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/admin-assets/images/neptune.png" />
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="#">Catalyst Laundry</a>
            </div>

            <p class="auth-description">Please sign-in to your account and continue to the dashboard.</p>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form action="/check_login" method="POST">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="admin@example.com">
                    {{-- validation error email --}}
                    @error('email')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="password" class="form-label mt-4">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                    {{-- validation error password --}}
                    @error('password')
                        <div style="color: red">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="/admin-assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="/admin-assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin-assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="/admin-assets/plugins/pace/pace.min.js"></script>
    <script src="/admin-assets/js/main.min.js"></script>
    <script src="/admin-assets/js/custom.js"></script>
    <script>
        // hide alert after 2.5 seconds with slow fadeout effect
        $(".alert").delay(2500).slideUp(500, function() {
            $(this).alert('close');
        });
    </script>
</body>
</html>
