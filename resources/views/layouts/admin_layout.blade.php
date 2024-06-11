<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="../../../../../../studentManagement/public/assets/img/brand/ueticon.png" type="image/png">
    <link rel="stylesheet"
        href="../../../../../../studentManagement/public/assets/vendor/select2/dist/css/select2.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../../../../../../studentManagement/public/assets/vendor/nucleo/css/nucleo.css"
        type="text/css">
    <link rel="stylesheet"
        href="../../../../../../studentManagement/public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../../../../../../studentManagement/public/assets/css/argon.css?v=1.2.0"
        type="text/css">
    <link rel="stylesheet" href="../../../../../../studentManagement/public/assets/vendor/animate.css/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="../../../../../../studentManagement/public/assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@1.0.0"></script>
</head>

<body>
    @include('components.Sidenav')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('components.Topnav')
        @yield('content')
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script>
        @if (Session::has('success'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true,
            }
            toastr.success("{{ session('success') }}");
        @elseif (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>
    <script>
        // Change the type of input to password or text
        function Toggle(index) {
            var temp = document.getElementsByClassName('password-hidden')[index];
            if (temp.type === "password") {
                temp.type = "text";
            } else {
                temp.type = "password";
            }
        }
    </script>
    <script src="../../../../../../studentManagement/public/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../../../../../../studentManagement/public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="../../../../../../studentManagement/public/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../../../../../../studentManagement/public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js">
    </script>
    <script src="../../../../../../studentManagement/public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js">
    </script>
    <!-- Optional JS -->
    <script src="../../../../../../studentManagement/public/assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../../../../../../studentManagement/public/assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="../../../../../../studentManagement/public/assets/vendor/select2/dist/js/select2.min.js"></script>
    <!-- Argon JS -->
    <script src="../../../../../../studentManagement/public/assets/js/argon.js?v=1.2.0"></script>
    <script src="../../../../../../studentManagement/public/assets/vendor/bootstrap-notify/bootstrap-notify.min.js">
    </script>

</body>

</html>
