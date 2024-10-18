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
        START SIGN UP AREA
======================================-->

    <section class="sign-up-area pt-80px pb-80px position-relative">
        <div class="container">
            <form action="{{ route('registration') }}" class="card card-item" method="post">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-body row p-0">
                    
                    <div class="col-lg-5 mx-auto">
                        <div class="form-action-wrapper py-5">
                            <div class="form-group">
                                <h3 class="fs-22 pb-3 fw-bold">Sign up to <span class="logo"><img src="frontend/images/logo.png" alt=""></span></h3>
                                <div class="divider"><span></span></div>
                            </div>
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Display name <span style="color: red">*</span> </label>
                                <input type="text" name="name" class="form-control form--control"
                                    placeholder="Enter name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!-- end form-group -->
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Email <span style="color: red">*</span></label>
                                <input type="email" name="email" class="form-control form--control"
                                    placeholder="Email address">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><!-- end form-group -->
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Password <span style="color: red">*</span></label>
                                <div class="input-group mb-1">
                                    <input class="form-control form--control password-field" type="password"
                                        name="password" placeholder="Password">
                                        {{-- @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                        
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
                                <p class="fs-13 lh-18">Passwords must contain at least eight characters.</p>
                            </div>
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Select User Type <span style="color: red">*</span></label>
                                <select name="user_type" id="" class="form-control">
                                    <option value="">Choose</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                                @error('user_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <button id="send-message-btn" class="btn btn-primary w-100" type="submit">Sign up <i
                                        class="la la-arrow-right icon ms-1"></i></button>
                            </div><!-- end form-group -->
                            <p class="fs-13 lh-18 pb-3">By clicking “Sign up”, you agree to our <a
                                    href="terms-and-conditions.html" class="text-color hover-underline">terms of
                                    conditions</a>, <a href="privacy-policy.html"
                                    class="text-color hover-underline">privacy policy</a></p>

                        </div><!-- end col-lg-5 -->
                    </div><!-- end row -->
                    <div class="col-lg-6">
                        <div
                            class="form-content d-flex align-items-center justify-content-center flex-column radius-top-left-8 radius-bottom-left-8 text-start">
                            <img src="frontend/images/signup.png" class="login-img" alt="">
                                <p class="text-black pt-60px pb-3">Already have an account?</p>
                                <a href="{{ route('login') }}" class="btn btn-primary px-5 lh-24">Log
                                    in</a>
                            </div>
                        </div>
                    </div><!-- end col-lg-6 -->
            </form>
        </div><!-- end container -->
        <div class="position-absolute top-0 left-0 w-100 h-100 z-index-n1">
            <svg class="w-100 h-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    fill="#2d86eb" opacity="0.06"></path>
            </svg>
        </div>
    </section>
    <!--======================================
        END SIGN UP AREA
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
