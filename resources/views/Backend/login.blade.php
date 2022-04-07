<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themes.getbootstrap.com/licenses/)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Family Safe Tracker Administrator Login Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Volt Premium Bootstrap Dashboard - Sign in page">
<meta name="author" content="Md. Jahidul Islam Noman">
<meta name="description" content="">
<meta name="keywords" content="" />
<link rel="canonical" href="">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:title" content="Family Safe Tracker Administrator Login Panel">
<meta property="og:description" content=".">
<meta property="og:image" content="">


<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/') }}public/assets/assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}public/assets/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}public/assets/assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="{{ asset('/') }}public/assets/assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="{{ asset('/') }}public/assets/assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Sweet Alert -->
<link type="text/css" href="{{ asset('/') }}public/assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{ asset('/') }}public/assets/vendor/notyf/notyf.min.css" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{ asset('/') }}public/assets/css/volt.css" rel="stylesheet">

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>
    .fmxw-500 {
  max-width: 510px !important;
}
</style>
</head>

<body>

   
    

    <main>

        <!-- Section -->
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <p class="text-center">
                    <a href="../dashboard/dashboard.html" class="d-flex align-items-center justify-content-center">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        Back to homepage
                    </a>
                </p>
                <div class="row justify-content-center form-bg-image" data-background-lg="{{ asset('/') }}public/assets/assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Family Safe Tracker </h1><h5>Administrator Login Panel</h5>
                                @if (Session::get('type')=='error')
                                <p class="text-center" style="font-weight: bold;color:red;font-size:16px;">{{ Session::get('message')}}</p>
                                @endif
                                @if (Session::get('type')=='success')
                                <p class="text-center" style="font-weight: bold;color:blue;font-size:16px;">{{ Session::get('message')}}</p>
                                @endif
                            </div>
                            <form action="{{ route('admin.login.post') }}"  method="POST" class="mt-4">
                                @csrf
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="email">Enter Your Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fa fa-phone"></i>
                                           
                                        </span>
                                        <input type="number" name="number" class="form-control @error('number') is-invalid @enderror" placeholder="Mobile Number Use 017########"  required="" autocomplete="off" value="{{ old('number') }}" id="email" autofocus >
                                        @if ($errors->has('number'))
                                        <span class="text-danger">{{ $errors->first('number') }}</span>
                                        @endif
                                        <span class="form-bar"></span>
                                    </div>  
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password">Enter Your Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2">
                                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                            </span>
                                            <input type="password" name="password" placeholder="Password" class="form-control  @error('password') is-invalid @enderror"  id="password" required>
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                            <span class="form-bar"></span>
                                        </div>  
                                    </div>
                                    <!-- End of Form -->
                                    <div class="d-flex justify-content-between align-items-top mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="remember">
                                            <label class="form-check-label mb-0" for="remember">
                                              Remember me
                                            </label>
                                        </div>
                                        <div><a href="./forgot-password.html" class="small text-right">Lost password?</a></div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-gray-800">Log In</button>
                                </div>
                            </form>
                           
                           
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="fw-normal">
                                    Not registered?
                                    <a href="./sign-up.html" class="fw-bold">Create account</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Core -->
<script src="{{ asset('/') }}public/assets/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="{{ asset('/') }}public/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Vendor JS -->
<script src="{{ asset('/') }}public/assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>

<!-- Slider -->
<script src="{{ asset('/') }}public/assets/vendor/nouislider/distribute/nouislider.min.js"></script>

<!-- Smooth scroll -->
<script src="{{ asset('/') }}public/assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<!-- Charts -->
<script src="{{ asset('/') }}public/assets/vendor/chartist/dist/chartist.min.js"></script>
<script src="{{ asset('/') }}public/assets/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<!-- Datepicker -->
<script src="{{ asset('/') }}public/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Sweet Alerts 2 -->
<script src="{{ asset('/') }}public/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="{{ asset('/') }}public/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Notyf -->
<script src="{{ asset('/') }}public/assets/vendor/notyf/notyf.min.js"></script>

<!-- Simplebar -->
<script src="{{ asset('/') }}public/assets/vendor/simplebar/dist/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="{{ asset('/') }}public/assets/assets/js/volt.js"></script>

    
</body>

</html>
