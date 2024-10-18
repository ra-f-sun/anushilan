<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Question Bank</title>

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
    {{-- <div id="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div> --}}
    <!-- end cssload-loader -->

    <!--======================================
        START HEADER AREA
    ======================================-->
    @include('frontend.partials.header')
    <!--======================================
        END HEADER AREA
======================================-->
    @yield('frontend.content')
    <!-- ================================
         END FOOTER AREA
================================= -->
    @include('frontend.partials.footer')<!-- end footer-area -->
    <!-- ================================
          END FOOTER AREA
================================= -->

    <!-- start back to top -->
    <div id="back-to-top" data-bs-toggle="tooltip" data-placement="top" title="Return to top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end back to top -->

    <!-- Modal -->
    <div class="modal fade modal-container login-form" id="loginModal" tabindex="-1" role="dialog"
        aria-labelledby="loginModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h5 class="modal-title" id="loginModalTitle">Good to see you again!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Email</label>
                            <input class="form-control form--control" type="email" name="email"
                                placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Password</label>
                            <div class="input-group mb-1">
                                <input class="form-control form--control password-field" type="password" name="password"
                                    placeholder="Enter password">
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
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="custom-control custom-checkbox fs-14">
                                <input type="checkbox" class="custom-control-input" id="rememberMe">
                                <label class="custom-control-label custom--control-label" for="rememberMe">Remember
                                    me!</label>
                            </div>
                            <a href="javascript:void(0)" class="lost-pass-btn fs-14 hover-underline">Forgot
                                Password?</a>
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="btn theme-btn w-100">
                                Login to Account <i class="la la-arrow-right icon ms-1"></i>
                            </button>
                        </div>
                        <p class="create-account-text text-end fs-14 pt-1">
                            New to disilab? <a class="signup-btn text-color hover-underline"
                                href="javascript:void(0)">Create account</a>
                        </p>
                        <div class="icon-element my-4 mx-auto shadow-sm fs-25">Or</div>
                        <div class="text-center">
                            <p class="fs-15 pb-3">Login with your social network</p>
                            <button class="btn theme-btn bg-8 mb-2 me-2"><i class="la la-facebook me-1"></i>
                                Facebook</button>
                            <button class="btn theme-btn bg-9 mb-2 me-2"><i class="la la-twitter me-1"></i>
                                Twitter</button>
                            <button class="btn theme-btn bg-10 mb-2 me-2"><i class="la la-google me-1"></i>
                                Google</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-container signup-form" id="signUpModal" tabindex="-1" role="dialog"
        aria-labelledby="signUpModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h5 class="modal-title" id="signUpModalTitle">Welcome! create your account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('registration') }}" class="card card-item" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Name</label>
                            <input class="form-control form--control" type="text" name="text"
                                placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Email</label>
                            <input class="form-control form--control" type="email" name="email"
                                placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Password</label>
                            <div class="input-group mb-1">
                                <input class="form-control form--control password-field" type="password"
                                    name="password" placeholder="Enter password">
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
                            <p class="fs-14 lh-20">Your password must be at least 6 characters long and must contain
                                letters, numbers and special characters. Cannot contain whitespace.</p>
                        </div>
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Select User Type</label>
                            <select name="user_type" id="" class="form-control">
                                <option value="">Choose</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox fs-14">
                                <input type="checkbox" class="custom-control-input" id="agreeCheckBox">
                                <label class="custom-control-label custom--control-label" for="agreeCheckBox">By
                                    signing up, you agree to our <a href="privacy-policy.html"
                                        class="text-color hover-underline">Privacy Policy.</a></label>
                            </div>
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="btn theme-btn w-100">
                                Register Account <i class="la la-arrow-right icon ms-1"></i>
                            </button>
                        </div>
                        <p class="create-account-text text-end fs-14">
                            Already on disilab? <a class="login-btn text-color hover-underline"
                                href="javascript:void(0)">Log in</a>
                        </p>
                        <div class="icon-element my-4 mx-auto shadow-sm fs-25">Or</div>
                        <div class="text-center">
                            <p class="fs-15 pb-3">Create account with your social network</p>
                            <button class="btn theme-btn bg-8 mb-2 me-2"><i class="la la-facebook me-1"></i>
                                Facebook</button>
                            <button class="btn theme-btn bg-9 mb-2 me-2"><i class="la la-twitter me-1"></i>
                                Twitter</button>
                            <button class="btn theme-btn bg-10 mb-2 me-2"><i class="la la-google me-1"></i>
                                Google</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-container recover-form" id="recoverModal" tabindex="-1" role="dialog"
        aria-labelledby="recoverModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h5 class="modal-title" id="recoverModalTitle">Reset password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-times"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="fs-15 lh-20 pb-3">
                        Enter your username or email to reset your password.
                        You will receive an email with instructions on how to reset your password. If you are
                        experiencing problems
                        resetting your password <a href="contact.html" class="text-color hover-underline">contact
                            us</a> or <a href="#" class="text-color hover-underline">send us an email</a>
                    </p>
                    <form method="post">
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Email</label>
                            <input class="form-control form--control" type="text" name="text"
                                placeholder="Email address">
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="btn theme-btn w-100">
                                Get New Password <i class="la la-arrow-right icon ms-1"></i>
                            </button>
                            <p class="create-account-text text-end fs-14">
                                Not a member? <a class="text-color signup-btn hover-underline"
                                    href="javascript:void(0)">Create account</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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
