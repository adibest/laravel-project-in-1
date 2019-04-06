<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/concept/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/concept/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/concept/assets/libs/css/style.css">
    <link rel="stylesheet" href="/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    @yield('style')
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         @include('layouts.header')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layouts.footer')
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="/concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="/concept/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="/concept/assets/libs/js/main-js.js"></script>
    @yield('script')
</body>
 
</html>