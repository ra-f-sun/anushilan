<header class="header-area bg-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="logo-box">
                    <a href="{{ route('home') }}" class="logo"><img src={{ asset('frontend/images/logo.png ')}} alt="logo"></a>
                    <div class="user-action">
                        <div class="search-menu-toggle icon-element icon-element-xs shadow-sm me-1"
                            data-bs-toggle="tooltip" data-placement="top" title="Search">
                            <i class="la la-search"></i>
                        </div>
                        <div class="off-canvas-menu-toggle icon-element icon-element-xs shadow-sm"
                            data-bs-toggle="tooltip" data-placement="top" title="Main menu">
                            <i class="la la-bars"></i>
                        </div>
                    </div>
                </div>
            </div><!-- end col-lg-2 -->
            <div class="col-lg-10">
                <div class="menu-wrapper">
                    <nav class="menu-bar me-auto menu-bar-white">
                        <ul>
                            <li>
                                <a href="{{ route('all.class') }}">প্রশ্নব্যাংক </a>

                            </li>
                            <li>
                                <a href="{{ route('premium.class') }}">প্রিমিয়াম প্রশ্ন </a>
 
                            </li>
                            <li>
                                <a href="{{ route('pack.index') }}">প্রিমিয়াম প্যাকেজ </a>
 
                            </li>
                            <li>
                                <a href="{{ route('category.exam') }}">পরীক্ষা </a>
 
                            </li>
                        </ul><!-- end ul -->
                    </nav><!-- end main-menu -->
                    <form method="post" class="me-4">
 
                    </form>
                    <div class="nav-right-button">
                        @if (Route::has('login'))
                            @auth
                                {{-- <form method="POST" action="{{ route('logout') }}">
                                    @csrf
 
 
                                    <button class="btn theme-btn theme-btn-white">Logout</button>
 
                                </form> --}}
                                <li class="dropdown user-dropdown">
                                    <a class="nav-link dropdown-toggle dropdown--toggle ps-2" href="#"
                                        id="userMenuDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div
                                            class="media media-card media--card shadow-none mb-0 rounded-0 align-items-center bg-transparent">
                                            <div class="media-img media-img-xs flex-shrink-0 rounded-full me-2">
                                                <img src="{{ asset(Auth::user()->getFirstMediaUrl()?: 'frontend/images/profile.jpg') }}" alt="avatar" class="rounded-full">
                                            </div>
                                            <div class="media-body p-0 border-left-0">
                                                <h5 class="fs-14" style="color: black">{{ Auth::user()->name }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown--menu dropdown-menu-right mt-3 keep-open"
                                        aria-labelledby="userMenuDropdown">
                                        <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                                        <div class="dropdown-divider border-top-gray mb-0"></div>
                                        <div class="dropdown-item-list">
                                            <a class="dropdown-item" href="{{ route('user.profile') }}"><i
                                                    class="la la-user me-2"></i>Profile</a>
 
                                            <a class="dropdown-item" href="{{ route('premium.category') }}"><i
                                                    class="la la-user-plus me-2"></i>আমার প্রশ্নব্যাংক</a>
                                            <a class="dropdown-item" href="{{ route('show.package') }}"><i
                                                    class="la la-gear me-2"></i>আমার প্যাকেজ</a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="dropdown-item"><i class="la la-power-off me-2"></i>Log
                                                    out</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <a href="{{ route('login') }}"
                                    class="btn theme-btn theme-btn-outline theme-btn-outline-white me-2 theme-btn-white"><i
                                        class="la la-sign-in me-1"></i> Login</a>
                                <a href="{{ route('register') }}" class="btn theme-btn theme-btn-white"><i
                                        class="la la-user me-1"></i> Sign up</a>
                            @endauth
                        @endif
                    </div><!-- end nav-right-button -->
                </div><!-- end menu-wrapper -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="off-canvas-menu custom-scrollbar-styled">
        <div class="off-canvas-menu-close icon-element icon-element-sm shadow-sm" data-bs-toggle="tooltip"
            data-placement="left" title="Close menu">
            <i class="la la-times"></i>
        </div><!-- end off-canvas-menu-close -->
        <ul class="generic-list-item off-canvas-menu-list pt-90px">
            <li>
                <a href="{{ route('all.class') }}">ফ্রী প্রশ্ন </a>
            </li>
            <li>
                <a href="{{ route('premium.class') }}">প্রিমিয়াম প্রশ্ন </a>
            </li>
            <li>
                <a href="{{ route('pack.index') }}">প্যাকেজ </a>
            </li>
            <li>
                <a href="{{ route('category.exam') }}">পরীক্ষা </a>
            </li>
        </ul>
        <div class="off-canvas-btn-box px-4 pt-5 text-center">
            @if (Route::has('login'))
                            @auth
                            <li class="dropdown user-dropdown">
                                <a class="nav-link dropdown-toggle dropdown--toggle ps-2" href="#"
                                    id="userMenuDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <div
                                        class="media media-card media--card shadow-none mb-0 rounded-0 align-items-center bg-transparent">
                                        <div class="media-img media-img-xs flex-shrink-0 rounded-full me-2">
                                            <img src="{{ asset(Auth::user()->getFirstMediaUrl()?: 'frontend/images/profile.jpg') }}" alt="avatar" class="rounded-full">
                                        </div>
                                        <div class="media-body p-0 border-left-0">
                                            <h5 class="fs-14" style="color: white">{{ Auth::user()->name }}</h5>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown--menu dropdown-menu-right mt-3 keep-open"
                                    aria-labelledby="userMenuDropdown">
                                    <h6 class="dropdown-header">{{ Auth::user()->name }}</h6>
                                    <div class="dropdown-divider border-top-gray mb-0"></div>
                                    <div class="dropdown-item-list">
                                        <a class="dropdown-item" href="{{ route('user.profile') }}"><i
                                                class="la la-user me-2"></i>Profile</a>
 
                                        <a class="dropdown-item" href="{{ route('premium.category') }}"><i
                                                class="la la-user-plus me-2"></i>আমার প্রশ্নব্যাংক</a>
                                        <a class="dropdown-item" href="{{ route('show.package') }}"><i
                                                class="la la-gear me-2"></i>আমার প্যাকেজ</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item"><i class="la la-power-off me-2"></i>Log
                                                out</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            @else
                            <a href="{{ route('login') }}" class="btn theme-btn theme-btn-sm theme-btn-outline"><i
                                class="la la-sign-in me-1"></i> Login</a>
                        <span class="fs-15 fw-medium d-inline-block mx-2">Or</span>
                        <a href="{{ route('register') }}" class="btn theme-btn theme-btn-sm" data-bs-toggle="modal"
                            data-bs-target="#signUpModal"><i class="la la-plus me-1"></i> Sign up</a>
                            @endauth
                            @endif
            
        </div>
    </div><!-- end off-canvas-menu -->
    <div class="mobile-search-form">
        <div class="d-flex align-items-center">
            <form method="post" class="flex-grow-1 me-3">
                <div class="form-group mb-0">
                    <input class="form-control form--control pl-40px" type="text" name="search"
                        placeholder="Type your search words...">
                    <span class="la la-search input-icon"></span>
                </div>
            </form>
            <div class="search-bar-close icon-element icon-element-sm shadow-sm">
                <i class="la la-times"></i>
            </div><!-- end off-canvas-menu-close -->
        </div>
    </div><!-- end mobile-search-form -->
    <div class="body-overlay"></div>
</header><!-- end header-area -->
 