<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Anushilan</title>

    <!-- Google fonts -->
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />




<!-- Favicon -->
<link rel="icon" sizes="16x16" href="images/favicon.png">

<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- end inject -->
</head>

<body>

    <!-- start cssload-loader -->
    <div id="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <!-- end cssload-loader -->


    <!--======================================
        START LOGIN AREA
======================================-->
    <section class="login-area pt-100px pb-80px position-relative">
        <div class="container">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <form action="{{ route('frontend.authenticate') }}" class="card card-item login-form" method="post">
                @csrf
                <div class="card-body row p-0">
                    <div class="col-lg-6">
                        
                        <div
                            class="form-content d-flex align-items-center justify-content-center flex-column radius-top-left-8 radius-bottom-left-8 text-center">
                            
                                <img src="frontend/images/login.png" class="login-img" alt="">
                            
                            {{-- <h3 class="fs-35 pb-3 fw-bold text-black">Good to see you again</h3>
                            <p class="text-black fs-18">Log in with your information that you entered
                                <br> during your registration.
                            </p> --}}
                            <p class="text-black text-center pb-3">Don't have an account?</p>
                            <a href="{{ route('register') }}" class="btn btn-primary px-5 lh-24">Sign
                                up</a>
                        </div>
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-5 mx-auto">
                        <div class="form-action-wrapper py-5">
                            <div class="form-group">
                                <h3 class="fs-22 pb-3 fw-bold">Log in to <span class="logo"><img src="frontend/images/logo.png" alt=""></span></h3>
                                <div class="divider"><span></span></div>
                            </div>
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Email</label>
                                <input type="email" name="email" class="form-control form--control"
                                    placeholder="Email address">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!-- end form-group -->
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Password</label>
                                <div class="input-group">
                                    <input class="form-control form--control password-field" type="password"
                                        name="password" placeholder="Password">
                                        
                                    <div class="input-group-append">
                                        <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password"
                                            type="button">
                                            <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                viewBox="0 0 24 24" width="22px" fill="currentColor">
                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                <path
                                                    d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                                            </svg>
                                            <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                viewBox="0 0 24 24" width="22px" fill="currentColor">
                                                <path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z"
                                                    fill="none" />
                                                <path
                                                    d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z" />
                                            </svg>
                                        </button>
                                    </div>
                                    
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!-- end form-group -->
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check fs-14">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">
                                        Remember me!
                                    </label>
                                </div>
                                <a href="{{ route('send.mail') }}" class="btn-text fs-14 hover-underline fw-regular">Forgot
                                    Password?</a>
                            </div><!-- end form-group -->
                            <div class="form-group">
                                <button id="send-message-btn" class="btn btn-primary w-100" type="submit">Log in <i
                                        class="la la-arrow-right icon ms-1"></i></button>
                            </div><!-- end form-group -->
                           
                        </div><!-- end form-action-wrapper -->
                    </div><!-- end col-lg-5 -->
                </div><!-- end row -->
            </form>

        </div><!-- end container -->
        <svg class="position-absolute bottom-0 left-0 w-100 z-index-n1" id="wave" viewBox="0 0 1440 490"
            version="1.1" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(248.597, 214.005, 202.895, 1)" offset="0%" />
                    <stop stop-color="rgba(250.873, 203.862, 99.942, 1)" offset="100%" />
                </linearGradient>
            </defs>
            <path style="transform:translate(0, 0px); opacity:0.1" fill="url(#sw-gradient-0)"
                d="M0,98L48,155.2C96,212,192,327,288,375.7C384,425,480,408,576,334.8C672,261,768,131,864,81.7C960,33,1056,65,1152,114.3C1248,163,1344,229,1440,269.5C1536,310,1632,327,1728,294C1824,261,1920,180,2016,130.7C2112,82,2208,65,2304,106.2C2400,147,2496,245,2592,253.2C2688,261,2784,180,2880,179.7C2976,180,3072,261,3168,310.3C3264,359,3360,376,3456,367.5C3552,359,3648,327,3744,294C3840,261,3936,229,4032,236.8C4128,245,4224,294,4320,326.7C4416,359,4512,376,4608,334.8C4704,294,4800,196,4896,147C4992,98,5088,98,5184,81.7C5280,65,5376,33,5472,73.5C5568,114,5664,229,5760,245C5856,261,5952,180,6048,138.8C6144,98,6240,98,6336,147C6432,196,6528,294,6624,294C6720,294,6816,196,6864,147L6912,98L6912,490L6864,490C6816,490,6720,490,6624,490C6528,490,6432,490,6336,490C6240,490,6144,490,6048,490C5952,490,5856,490,5760,490C5664,490,5568,490,5472,490C5376,490,5280,490,5184,490C5088,490,4992,490,4896,490C4800,490,4704,490,4608,490C4512,490,4416,490,4320,490C4224,490,4128,490,4032,490C3936,490,3840,490,3744,490C3648,490,3552,490,3456,490C3360,490,3264,490,3168,490C3072,490,2976,490,2880,490C2784,490,2688,490,2592,490C2496,490,2400,490,2304,490C2208,490,2112,490,2016,490C1920,490,1824,490,1728,490C1632,490,1536,490,1440,490C1344,490,1248,490,1152,490C1056,490,960,490,864,490C768,490,672,490,576,490C480,490,384,490,288,490C192,490,96,490,48,490L0,490Z" />
            <defs>
                <linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(232.659, 165.487, 143.914, 1)" offset="0%" />
                    <stop stop-color="rgba(253.15, 195.918, 69.406, 1)" offset="100%" />
                </linearGradient>
            </defs>
            <path style="transform:translate(0, 50px); opacity:0.2" fill="url(#sw-gradient-1)"
                d="M0,343L48,343C96,343,192,343,288,302.2C384,261,480,180,576,155.2C672,131,768,163,864,196C960,229,1056,261,1152,285.8C1248,310,1344,327,1440,326.7C1536,327,1632,310,1728,277.7C1824,245,1920,196,2016,220.5C2112,245,2208,343,2304,359.3C2400,376,2496,310,2592,236.8C2688,163,2784,82,2880,98C2976,114,3072,229,3168,236.8C3264,245,3360,147,3456,155.2C3552,163,3648,278,3744,277.7C3840,278,3936,163,4032,155.2C4128,147,4224,245,4320,277.7C4416,310,4512,278,4608,269.5C4704,261,4800,278,4896,302.2C4992,327,5088,359,5184,383.8C5280,408,5376,425,5472,432.8C5568,441,5664,441,5760,392C5856,343,5952,245,6048,204.2C6144,163,6240,180,6336,220.5C6432,261,6528,327,6624,359.3C6720,392,6816,392,6864,392L6912,392L6912,490L6864,490C6816,490,6720,490,6624,490C6528,490,6432,490,6336,490C6240,490,6144,490,6048,490C5952,490,5856,490,5760,490C5664,490,5568,490,5472,490C5376,490,5280,490,5184,490C5088,490,4992,490,4896,490C4800,490,4704,490,4608,490C4512,490,4416,490,4320,490C4224,490,4128,490,4032,490C3936,490,3840,490,3744,490C3648,490,3552,490,3456,490C3360,490,3264,490,3168,490C3072,490,2976,490,2880,490C2784,490,2688,490,2592,490C2496,490,2400,490,2304,490C2208,490,2112,490,2016,490C1920,490,1824,490,1728,490C1632,490,1536,490,1440,490C1344,490,1248,490,1152,490C1056,490,960,490,864,490C768,490,672,490,576,490C480,490,384,490,288,490C192,490,96,490,48,490L0,490Z" />
        </svg>
    </section>
    <!--======================================
        END LOGIN AREA
======================================-->

    <!-- template js files -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Existing toastr code...
    
            // Add this new code for password toggle
            $('.toggle-password').click(function() {
                var passwordField = $(this).closest('.input-group').find('.password-field');
                var eyeOn = $(this).find('.eye-on');
                var eyeOff = $(this).find('.eye-off');
    
                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    eyeOn.hide();
                    eyeOff.show();
                } else {
                    passwordField.attr('type', 'password');
                    eyeOn.show();
                    eyeOff.hide();
                }
            });
    
            // Initially hide the eye-off icon
            $('.eye-off').hide();
        });
    </script>
    <script>
        $(document).ready(function() {
            @if (session('success'))
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-bottom-center", // Positioning Toastr at the bottom center
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.success("{{ session('success') }}", 'Success');
            @endif

            @if (session('error'))
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-bottom-center", // Positioning Toastr at the bottom center
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.error("{{ session('error') }}", 'Error');
            @endif
        });
    </script>

    <style>
        .toast-error {
            background-color: #ff5722 !important;
            color: #ffffff !important;
        }
        .toast-error .toast-title {
            font-weight: bold;
        }
        .toast-error .toast-message {
            font-size: 14px;
        }

        .toast-success {
            background-color: #007bff !important;
            color: #ffffff !important;
        }
        .toast-success .toast-title {
            font-weight: bold;
        }
        .toast-success .toast-message {
            font-size: 14px;
        }
        .toast-bottom-center {
            bottom: 20px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
        }
    </style>
</body>


</html>
