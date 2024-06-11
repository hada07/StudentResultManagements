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
    <title>Login</title>
    <!-- Favicon -->
    <link rel="icon" href="../public/assets/img/brand/ueticon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../public/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../public/assets/css/argon.css?v=1.2.0" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body class="bg-default">
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-5">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">ĐẠI HỌC CÔNG NGHỆ</h1>
                            <p class="text-lead text-white">Sáng tạo - Tiên phong - Chất lượng cao</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Đăng ký tài khoản    </small>
                            </div>
                            <form role="form" action="{{ route('register') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                  <div class="input-group input-group-merge input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                      </div>
                                      <input class="form-control" placeholder="Nhập mã trường cấp" type="text"
                                          name="college_id">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group input-group-merge input-group-alternative mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                      </div>
                                      <input class="form-control" placeholder="Email nhận thông báo" type="email"
                                          name="email">
                                  </div>
                              </div>
                              <div class="row my-4">
                                  <div class="col-12">
                                  </div>
                              </div>
                              <div class="text-center">
                                  <button type="submit" class="btn btn-primary mt-4">Đăng ký tài khoản</button>
                              </div>
                          </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
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
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="../public/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="../public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../public/assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="../public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="../public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Argon JS -->
        <script src="../public/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
