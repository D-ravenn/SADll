<!DOCTYPE html>
<html lang="en" class="h-full" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click"
    data-menu-position="fixed">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'ProjectValex') }}</title>
    <meta name="description" content="Admin dashboard template built with Tailwind CSS.">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins/swiper.min.css') }}">
</head>

<body class="landing-body">

    <!-- ========== Switcher  ========== -->
    <div id="hs-overlay-switcher" class="hs-overlay hidden ti-offcanvas ti-offcanvas-right" tabindex="-1">
        <div class="ti-offcanvas-header">
            <h5 class="ti-offcanvas-title">Switcher</h5>
            <button type="button"
                class="ti-btn flex-shrink-0 p-0 transition-none text-defaulttextcolor dark:text-defaulttextcolor/70 hover:text-gray-700 focus:ring-gray-400 focus:ring-offset-white dark:hover:text-white/80 dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                data-hs-overlay="#hs-overlay-switcher">
                <span class="sr-only">Close modal</span>
                <i class="ri-close-circle-line leading-none text-lg"></i>
            </button>
        </div>
        <div class="ti-offcanvas-body" id="switcher-body">
            <div>
                <div>
                    <p class="switcher-style-head">Theme Color Mode:</p>
                    <div class="grid grid-cols-3 gap-x-6 switcher-style">
                        <div class="flex">
                            <input type="radio" name="theme-style" class="ti-form-radio" id="switcher-light-theme" checked>
                            <label for="switcher-light-theme" class="text-xs text-defaulttextcolor dark:text-defaulttextcolor/70 font-semibold ltr:ml-2 rtl:mr-2">Light</label>
                        </div>
                        <div class="flex">
                            <input type="radio" name="theme-style" class="ti-form-radio" id="switcher-dark-theme">
                            <label for="switcher-dark-theme" class="text-xs text-defaulttextcolor dark:text-defaulttextcolor/70 font-semibold ltr:ml-2 rtl:mr-2">Dark</label>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="switcher-style-head">Directions:</p>
                    <div class="grid grid-cols-3 gap-x-6 switcher-style">
                        <div class="flex">
                            <input type="radio" name="direction" class="ti-form-radio" id="switcher-ltr" checked>
                            <label for="switcher-ltr" class="text-xs font-semibold text-defaulttextcolor dark:text-defaulttextcolor/70 ltr:ml-2 rtl:mr-2">LTR</label>
                        </div>
                        <div class="flex">
                            <input type="radio" name="direction" class="ti-form-radio" id="switcher-rtl">
                            <label for="switcher-rtl" class="text-xs font-semibold text-defaulttextcolor dark:text-defaulttextcolor/70 ltr:ml-2 rtl:mr-2">RTL</label>
                        </div>
                    </div>
                </div>
                <div class="theme-colors">
                    <p class="switcher-style-head">Theme Primary:</p>
                    <div class="flex switcher-style space-x-3 rtl:space-x-reverse">
                        <div class="ti-form-radio switch-select">
                            <input class="ti-form-radio color-input color-primary-1" type="radio" name="theme-primary" id="switcher-primary" checked>
                        </div>
                        <div class="ti-form-radio switch-select">
                            <input class="ti-form-radio color-input color-primary-2" type="radio" name="theme-primary" id="switcher-primary1">
                        </div>
                        <div class="ti-form-radio switch-select">
                            <input class="ti-form-radio color-input color-primary-3" type="radio" name="theme-primary" id="switcher-primary2">
                        </div>
                        <div class="ti-form-radio switch-select">
                            <input class="ti-form-radio color-input color-primary-4" type="radio" name="theme-primary" id="switcher-primary3">
                        </div>
                        <div class="ti-form-radio switch-select">
                            <input class="ti-form-radio color-input color-primary-5" type="radio" name="theme-primary" id="switcher-primary4">
                        </div>
                        <div class="ti-form-radio switch-select ltr:pl-0 rtl:pr-0 mt-1 color-primary-light">
                            <div class="theme-container-primary"></div>
                            <div class="pickr-container-primary"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="switcher-style-head">Reset:</p>
                    <div class="flex justify-center">
                        <a id="reset-all" class="ti-btn ti-btn-danger-full mt-4" href="javascript:void(0);">Reset</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== END Switcher  ========== -->

    <div class="landing-page-wrapper relative">

        <!-- Start::Header -->
        <header class="app-header">
            <div class="main-header-container container-fluid">
                <div class="header-content-left">
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="{{ url('/') }}" class="header-logo">
                                <img src="{{ asset('backend/assets/images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo">
                                <img src="{{ asset('backend/assets/images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark">
                            </a>
                        </div>
                    </div>
                    <div class="header-element">
                        <a aria-label="anchor" href="javascript:void(0);" class="sidemenu-toggle header-link">
                            <span class="open-toggle">
                                <i class="ri-menu-3-line text-xl"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="header-content-right">
                    <div class="header-element !items-center">
                        <div class="lg:hidden block">
                            @guest
                                <a href="{{ route('login') }}" class="ti-btn ti-btn-primary !m-0">Login</a>
                            @else
                                <a href="{{ url('/dashboard') }}" class="ti-btn ti-btn-primary !m-0">Dashboard</a>
                            @endguest
                            <a aria-label="anchor" href="javascript:void(0);" class="ti-btn m-0 p-2 px-3 ti-btn-success"
                                data-hs-overlay="#hs-overlay-switcher"><i class="ri-settings-3-line animate-spin-slow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End::Header -->

        <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky !top-0" id="sidebar">
            <div class="container-xl !p-0">
                <div class="main-sidebar">
                    <nav class="main-menu-container nav nav-pills flex-column sub-open">
                        <div class="landing-logo-container my-auto hidden lg:block">
                            <div class="responsive-logo">
                                <a class="responsive-logo-light" href="{{ url('/') }}" aria-label="Brand">
                                    <img src="{{ asset('backend/assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="mx-auto h-[2rem]">
                                </a>
                                <a class="responsive-logo-dark" href="{{ url('/') }}" aria-label="Brand">
                                    <img src="{{ asset('backend/assets/images/brand-logos/desktop-white.png') }}" alt="logo" class="mx-auto h-[2rem]">
                                </a>
                            </div>
                        </div>
                        <div class="slide-left hidden" id="slide-left">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                            </svg>
                        </div>
                        <ul class="main-menu">
                            <li class="slide"><a class="side-menu__item" href="#home"><span class="side-menu__label">Home</span></a></li>
                            <li class="slide"><a href="#features" class="side-menu__item"><span class="side-menu__label">Features</span></a></li>
                            <li class="slide"><a href="#about" class="side-menu__item"><span class="side-menu__label">About</span></a></li>
                            <li class="slide"><a href="#statistics" class="side-menu__item"><span class="side-menu__label">Statistics</span></a></li>
                            <li class="slide"><a href="#pricing" class="side-menu__item"><span class="side-menu__label">Pricing</span></a></li>
                            <li class="slide"><a href="#testimonials" class="side-menu__item"><span class="side-menu__label">Clients</span></a></li>
                            <li class="slide"><a href="#faq" class="side-menu__item"><span class="side-menu__label">Faq's</span></a></li>
                            <li class="slide"><a href="#contact" class="side-menu__item"><span class="side-menu__label">Contact</span></a></li>
                        </ul>
                        <div class="slide-right hidden" id="slide-right">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                            </svg>
                        </div>
                        <div class="lg:flex hidden space-x-2 rtl:space-x-reverse">
                            @guest
                                <a href="{{ route('login') }}" class="ti-btn w-[6.375rem] ti-btn-primary-full m-0 p-2">Login</a>
                            @else
                                <a href="{{ url('/dashboard') }}" class="ti-btn w-[6.375rem] ti-btn-primary-full m-0 p-2">Dashboard</a>
                            @endguest
                            <a aria-label="anchor" href="javascript:void(0);" class="ti-btn m-0 p-2 px-3 ti-btn-light !font-medium"
                                data-hs-overlay="#hs-overlay-switcher"><i class="ri-settings-3-line animate-spin-slow"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </aside>
        <!-- End::app-sidebar -->

        <!-- Start::main-content -->
        <div class="main-content !p-0 landing-main dark:text-defaulttextcolor/70">

            <!-- Hero / Home -->
            <div class="landing-banner" id="home">
                <section class="section !pt-[6rem]">
                    <div class="container main-banner-container !pt-3 sm:!pt-[6rem]">
                        <div class="grid grid-cols-12 gap-x-6">
                            <div class="xxl:col-span-2 xl:col-span-2 lg:col-span-2 md:col-span-2 col-span-1"></div>
                            <div class="xxl:col-span-8 xl:col-span-8 lg:col-span-8 md:col-span-8 col-span-10">
                                <div class="py-4 pb-lg-0 text-center">
                                    <div class="mb-3">
                                        <h5 class="font-semibold text-fixed-white op-9">Manage Your Business</h5>
                                    </div>
                                    <p class="landing-banner-heading mb-3 cursor-default">Build Your Dream Project with {{ config('app.name') }} !</p>
                                    <div class="fs-16 mb-5 text-fixed-white op-7">
                                        A powerful admin dashboard template to help you design stunning dashboards that will wow your target viewers or users to no end.
                                    </div>
                                    @guest
                                        <a href="{{ route('login') }}" class="m-1 ti-btn ti-btn-primary-full">
                                            Login <i class="fe fe-log-in ms-2 align-middle"></i>
                                        </a>
                                    @else
                                        <a href="{{ url('/dashboard') }}" class="m-1 ti-btn ti-btn-primary-full">
                                            Go to Dashboard <i class="fe fe-arrow-right ms-2 align-middle"></i>
                                        </a>
                                    @endguest
                                </div>
                            </div>
                            <div class="xxl:col-span-2 xl:col-span-2 lg:col-span-2 md:col-span-2 col-span-1"></div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Features -->
            <section class="section text-defaulttextcolor dark:text-defaulttextcolor/70 section-bg" id="features">
                <div class="container text-center position-relative">
                    <p class="text-[0.75rem] font-semibold text-success mb-1"><span class="landing-section-heading">Features</span></p>
                    <div class="landing-title"></div>
                    <h3 class="font-semibold mb-2">Main Features</h3>
                    <div class="row justify-content-center">
                        <div class="col-xl-7">
                            <p class="text-textmuted fs-15 mb-5 font-normal">We are proud to have top class clients and customers, which motivates us to work more on projects.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-x-6 justify-center">
                        <div class="xl:col-span-12 col-span-12">
                            <div class="grid grid-cols-12 gap-x-6 justify-evenly">
                                <div class="xl:col-span-3 lg:col-span-6 md:col-span-6 sm:col-span-6 col-span-12 mb-4">
                                    <div class="card rounded-sm bg-white dark:bg-bodybg features main-features main-features-4 p-6 active">
                                        <div class="bg-img mb-2">
                                            <svg width="50" class="inline-flex" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                                <circle cx="64" cy="64" r="64" fill="#42A3DB"></circle>
                                                <path fill="#FFF" d="M93.5 52c1.8-1.8 1.8-4.7 0-6.5-1.3-1.3-1.7-3.3-1-5 1-2.4-.1-5-2.5-6-1.7-.7-2.8-2.4-2.8-4.3 0-2.5-2.1-4.6-4.6-4.6-1.9 0-3.5-1.1-4.3-2.8-1-2.4-3.7-3.5-6-2.5-1.7.7-3.7.3-5-1-1.8-1.8-4.7-1.8-6.5 0-1.3 1.3-3.3 1.7-5 1-2.4-1-5 .1-6 2.5-.7 1.7-2.4 2.8-4.3 2.8-2.5 0-4.6 2.1-4.6 4.6 0 1.9-1.1 3.5-2.8 4.3-2.4 1-3.5 3.7-2.5 6 .7 1.7.3 3.7-1 5-1.8 1.8-1.8 4.7 0 6.5 1.3 1.3 1.7 3.3 1 5-1 2.4.1 5 2.5 6 1.7.7 2.8 2.4 2.8 4.3 0 2.5 2.1 4.6 4.6 4.6 1.9 0 3.5 1.1 4.3 2.8 1 2.4 3.7 3.5 6 2.5 1.7-.7 3.7-.3 5 1 1.8 1.8 4.7 1.8 6.5 0 1.3-1.3 3.3-1.7 5-1 2.4 1 5-.1 6-2.5.7-1.7 2.4-2.8 4.3-2.8 2.5 0 4.6-2.1 4.6-4.6 0-1.9 1.1-3.5 2.8-4.3 2.4-1 3.5-3.7 2.5-6-.7-1.7-.3-3.7 1-5z"></path>
                                                <path fill="#FFCD0A" d="M64 70.8c-12.2 0-22.1-9.9-22.1-22.1 0-12.2 9.9-22.1 22.1-22.1 12.2 0 22.1 9.9 22.1 22.1 0 12.2-9.9 22.1-22.1 22.1z"></path>
                                                <path fill="#FFF" d="M59.9 61c-.6 0-1.1-.2-1.5-.7l-8.3-9.2c-.7-.8-.7-2.1.1-2.8.8-.7 2.1-.7 2.8.1l6.7 7.5 15.1-18.8c.7-.9 2-1 2.8-.3.9.7 1 2 .3 2.8L61.4 60.2c-.3.5-.9.8-1.5.8z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="font-bold">Quality &amp; Clean Code</h5>
                                            <p class="mb-0">The admin code is maintained very cleanly and well-structured with proper comments.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="xl:col-span-3 lg:col-span-6 md:col-span-6 sm:col-span-6 col-span-12 mb-4">
                                    <div class="card rounded-sm bg-white dark:bg-bodybg features main-features main-features-2 p-6">
                                        <div class="bg-img mb-2">
                                            <svg width="50" class="inline-flex" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                                <circle cx="64" cy="64" r="63.5" fill="#54C0EB"></circle>
                                                <rect width="80.3" height="46.9" x="23.9" y="33.4" fill="#FFF"></rect>
                                                <rect width="9.7" height="27.7" x="32.3" y="46.7" fill="#ACB3BA"></rect>
                                                <rect width="9.7" height="15.8" x="45.7" y="58.7" fill="#4CDBC4"></rect>
                                                <rect width="9.7" height="23.1" x="59.1" y="51.3" fill="#FFD05B"></rect>
                                                <rect width="9.7" height="35.7" x="72.6" y="38.7" fill="#84DBFF"></rect>
                                                <rect width="9.7" height="8.1" x="86" y="66.3" fill="#FF7058"></rect>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="font-bold">Multiple Demos</h5>
                                            <p class="mb-0">We included multiple demos, preview video, and screenshots to give a quick overview of our admin template.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="xl:col-span-3 lg:col-span-6 md:col-span-6 sm:col-span-6 col-span-12 mb-4">
                                    <div class="card rounded-sm bg-white dark:bg-bodybg features main-features main-features-3 p-6">
                                        <div class="bg-img mb-2">
                                            <svg width="50" class="inline-flex" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                                <circle cx="64" cy="64" r="63.5" fill="#54C0EB"></circle>
                                                <path fill="#FFF" d="M42.2,96H23.6c-1.6,0-2.8-1.3-2.8-2.8V34.8c0-1.6,1.3-2.8,2.8-2.8h18.6c1.6,0,2.8,1.3,2.8,2.8v58.3C45.1,94.7,43.8,96,42.2,96z"></path>
                                                <rect width="18.7" height="36.8" x="23.6" y="35.8" fill="#4CDBC4"></rect>
                                                <path fill="#FFF" d="M68.8,96H50.2c-1.6,0-2.8-1.3-2.8-2.8V34.8c0-1.6,1.3-2.8,2.8-2.8h18.6c1.6,0,2.8,1.3,2.8,2.8v58.3C71.6,94.7,70.4,96,68.8,96z"></path>
                                                <rect width="18.7" height="36.8" x="50.1" y="35.8" fill="#FF7058"></rect>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="font-bold">Widgets</h5>
                                            <p class="mb-0">30+ widgets are included in this template. Please check out the best option that suits you.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="xl:col-span-3 lg:col-span-6 md:col-span-6 sm:col-span-6 col-span-12 mb-4">
                                    <div class="card rounded-sm bg-white dark:bg-bodybg features main-features main-features-4 p-6">
                                        <div class="bg-img mb-2">
                                            <svg width="50" class="inline-flex" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                                <circle cx="64" cy="64" r="63.5" fill="#FFD05B"></circle>
                                                <path fill="#FFF" d="M30,103.8l0-79.7c0-1.8,1.5-3.3,3.3-3.3h50.1l0,11.4c0,1.8,1.5,3.3,3.3,3.3H98l0,68.3c0,1.8-1.5,3.3-3.3,3.3H33.3C31.5,107.1,30,105.6,30,103.8z"></path>
                                                <rect width="54.6" height="2.4" x="36.7" y="50.7" fill="#E6E9EE"></rect>
                                                <rect width="54.6" height="2.4" x="36.7" y="58.2" fill="#E6E9EE"></rect>
                                                <rect width="54.6" height="2.4" x="36.7" y="65.8" fill="#E6E9EE"></rect>
                                                <rect width="54.6" height="2.4" x="36.7" y="73.4" fill="#E6E9EE"></rect>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="font-bold">Validation Forms</h5>
                                            <p class="mb-0">Different types of form validation are implemented with strict validation rules.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About / Our Mission -->
            <section class="section bg-white dark:bg-bodybg text-defaulttextcolor dark:text-defaulttextcolor/70" id="about">
                <div class="container text-center">
                    <p class="text-[0.75rem] font-semibold text-success mb-1"><span class="landing-section-heading">Our Mission</span></p>
                    <div class="landing-title"></div>
                    <h3 class="font-semibold mb-2">Our mission is to make work meaningful.</h3>
                    <p class="text-textmuted fs-15 mb-3 font-normal">Building tools that empower teams to achieve more with less effort.</p>
                    <div class="grid grid-cols-12 justify-center items-center mx-0">
                        <div class="xxl:col-span-5 xl:col-span-5 lg:col-span-5 col-span-12 text-center">
                            <img src="{{ asset('backend/assets/images/authentication/9.png') }}" alt="" class="img-fluid inline-flex">
                        </div>
                        <div class="xxl:col-span-7 xl:col-span-7 lg:col-span-7 col-span-12 pt-5 pb-0 px-lg-2 px-5 text-start">
                            <h4 class="text-lg-start font-medium mb-4">We are a creative agency with a passion for design.</h4>
                            <div class="grid grid-cols-12">
                                <div class="col-span-12">
                                    <div class="flex mb-2">
                                        <span><i class='bx bxs-badge-check text-primary text-[1.125rem]'></i></span>
                                        <div class="ms-2">
                                            <h6 class="font-medium mb-0">Quality &amp; Clean Code</h6>
                                            <p class="text-textmuted mb-3">The admin code is maintained very cleanly and well-structured with proper comments.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="flex mb-2">
                                        <span><i class='bx bxs-badge-check text-primary text-[1.125rem]'></i></span>
                                        <div class="ms-2">
                                            <h6 class="font-medium mb-0">Well Documented</h6>
                                            <p class="text-textmuted mb-3">The documentation provides clear-cut material. It is explained in such a way that every user can understand.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12">
                                    <div class="flex mb-2">
                                        <span><i class='bx bxs-badge-check text-primary text-[1.125rem]'></i></span>
                                        <div class="ms-2">
                                            <h6 class="font-medium mb-0">Switch Easily Between Color Styles</h6>
                                            <p class="text-textmuted">Easily switch from one color style to another with our built-in theme switcher.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Statistics -->
            <section class="section dark:!bg-black/10 section-bg text-defaulttextcolor dark:text-defaulttextcolor/70" id="statistics">
                <div class="container text-center position-relative">
                    <p class="text-[0.75rem] font-semibold text-success mb-1"><span class="landing-section-heading">STATISTICS</span></p>
                    <h3 class="font-semibold mb-2 text-defaulttextcolor dark:text-defaulttextcolor/70">More than 120+ projects completed.</h3>
                    <p class="text-[#8c9097] text-[0.9375rem] mb-5 font-normal">We are proud to have top class clients and customers, which motivates us to work more on projects.</p>
                    <div class="grid grid-cols-12 gap-x-6 container">
                        <div class="xl:col-span-1"></div>
                        <div class="xl:col-span-2 lg:col-span-4 md:col-span-6 col-span-12 mb-3">
                            <div class="p-4 text-center !rounded-sm bg-white dark:bg-bodybg border dark:border-defaultborder/10">
                                <span class="mb-4 avatar avatar-lg avatar-rounded bg-primary/10 !text-primary"><i class='text-[1.5rem] bx bx-spreadsheet'></i></span>
                                <h3 class="font-semibold mb-0 text-dark">120+</h3>
                                <p class="mb-1 text-[0.875rem] opacity-[0.7] text-[#8c9097]">Projects</p>
                            </div>
                        </div>
                        <div class="xl:col-span-2 lg:col-span-4 md:col-span-6 col-span-12 mb-3">
                            <div class="p-4 text-center !rounded-sm !bg-white dark:!bg-bodybg border dark:border-defaultborder/10">
                                <span class="mb-4 avatar avatar-lg avatar-rounded bg-primary/10 !text-primary"><i class='text-[1.5rem] bx bx-user-plus'></i></span>
                                <h3 class="font-semibold mb-0 text-dark">20K+</h3>
                                <p class="mb-1 text-[0.875rem] opacity-[0.7] text-[#8c9097]">Clients</p>
                            </div>
                        </div>
                        <div class="xl:col-span-2 lg:col-span-4 md:col-span-6 col-span-12 mb-3">
                            <div class="p-4 text-center !rounded-sm !bg-white dark:!bg-bodybg border dark:border-defaultborder/10">
                                <span class="mb-4 avatar avatar-lg avatar-rounded bg-primary/10 !text-primary"><i class='text-[1.5rem] bx bx-money'></i></span>
                                <h3 class="font-semibold mb-0 text-dark">$45.8M</h3>
                                <p class="mb-1 text-[0.875rem] opacity-[0.7] text-[#8c9097]">Income Earned</p>
                            </div>
                        </div>
                        <div class="xl:col-span-2 lg:col-span-4 md:col-span-6 col-span-12 mb-3">
                            <div class="p-4 text-center !rounded-sm !bg-white dark:!bg-bodybg border dark:border-defaultborder/10">
                                <span class="mb-4 avatar avatar-lg avatar-rounded bg-primary/10 !text-primary"><i class='text-[1.5rem] bx bx-user-circle'></i></span>
                                <h3 class="font-semibold mb-0 text-dark">854</h3>
                                <p class="mb-1 text-[0.875rem] opacity-[0.7] text-[#8c9097]">Employees</p>
                            </div>
                        </div>
                        <div class="xl:col-span-2 lg:col-span-4 md:col-span-6 col-span-12 mb-3">
                            <div class="p-4 text-center !rounded-sm bg-white dark:!bg-bodybg border dark:border-defaultborder/10">
                                <span class="mb-4 avatar avatar-lg avatar-rounded bg-primary/10 !text-primary"><i class='text-[1.5rem] bx bx-calendar'></i></span>
                                <h3 class="font-semibold mb-0 text-dark">5+</h3>
                                <p class="mb-1 text-[0.875rem] opacity-[0.7] text-[#8c9097]">Years of Experience</p>
                            </div>
                        </div>
                        <div class="xl:col-span-1"></div>
                    </div>
                </div>
            </section>

            <!-- Testimonials -->
            <section class="section landing-testimonials" id="testimonials">
                <div class="container text-center">
                    <p class="fs-12 font-semibold text-success mb-1"><span class="landing-section-heading">TESTIMONIALS</span></p>
                    <div class="landing-title"></div>
                    <h3 class="font-semibold text-defaulttextcolor dark:text-defaulttextcolor/70 mb-2">What People Are Saying About Our Product.</h3>
                    <p class="text-muted fs-15 mb-5 font-normal">Some of the reviews our clients gave which brings motivation to work for future projects.</p>
                    <div class="swiper pagination-dynamic text-start">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="box testimonial-card !shadow-none">
                                    <div class="box-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="{{ asset('backend/assets/images/faces/11.jpg') }}" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4"><i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.</p>
                                            <p class="mb-0 font-semibold fs-16">Json Taylor</p>
                                            <p class="mb-0 fs-11 text-muted">Web Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box testimonial-card !shadow-none">
                                    <div class="box-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="{{ asset('backend/assets/images/faces/15.jpg') }}" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4"><i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>Nulla in nunc eu justo varius bibendum ac quis metus. Phasellus varius aliquam lorem quis sem vitae, pellentesque.</p>
                                            <p class="mb-0 font-semibold fs-16">Harry Linson</p>
                                            <p class="mb-0 fs-11 text-muted">CEO</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="box testimonial-card !shadow-none">
                                    <div class="box-body">
                                        <div class="testimonia text-center">
                                            <span class="avatar avatar-xl avatar-rounded mb-1">
                                                <img src="{{ asset('backend/assets/images/faces/9.jpg') }}" alt="">
                                            </span>
                                            <div class="d-flex align-items-center justify-content-center mb-2">
                                                <span class="text-warning d-block">
                                                    <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i>
                                                </span>
                                            </div>
                                            <p class="op-8 mb-4"><i class="fa fa-quote-left fs-22 text-primary op-6 me-2"></i>In nec elit nec risus varius cursus vitae eget augue. Vestibulum bibendum, diam nec elementum imperdiet.</p>
                                            <p class="mb-0 font-semibold fs-16">Mathew Brown</p>
                                            <p class="mb-0 fs-11 text-muted">Project Manager</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination mt-4"></div>
                    </div>
                </div>
            </section>

            <!-- Contact -->
            <section class="section text-defaulttextcolor dark:text-defaulttextcolor/70 text-[0.813rem]" id="contact">
                <div class="container text-center">
                    <p class="text-[0.75rem] font-semibold text-success mb-1"><span class="landing-section-heading">CONTACT US</span></p>
                    <div class="landing-title"></div>
                    <h3 class="font-semibold mb-2">Have any questions ? We would love to hear from you.</h3>
                    <p class="text-textmuted fs-15 mb-5 font-normal">You can contact us anytime regarding any queries.</p>
                    <div class="text-start grid grid-cols-12 gap-x-6 justify-between">
                        <div class="lg:col-span-4 col-span-12">
                            <div class="card bg-white dark:bg-bodybg !shadow-none rounded-sm">
                                <div class="box-body px-[3rem] py-[1.5rem]">
                                    <div class="flex mb-3 mt-3">
                                        <div class="contact-icon contact-icon-1 border !border-primary bg-primary/10 m-0">
                                            <i class="fe fe-map-pin !text-primary text-[1.0625rem]"></i>
                                        </div>
                                        <div class="ms-3 text-start">
                                            <h6 class="mb-1 font-medium">Main Branch</h6>
                                            <p class="mb-4">San Francisco, CA</p>
                                        </div>
                                    </div>
                                    <div class="flex mb-3">
                                        <div class="contact-icon contact-icon-2 border !border-danger bg-danger/10">
                                            <i class="fe fe-mail !text-danger text-[1.0625rem]"></i>
                                        </div>
                                        <div class="ms-3 text-start">
                                            <h6 class="mb-1 font-medium">Email</h6>
                                            <p class="mb-4">info@example.com</p>
                                        </div>
                                    </div>
                                    <div class="flex mb-3">
                                        <div class="contact-icon contact-icon-3 border !border-success bg-success/10">
                                            <i class="fe fe-headphones !text-success text-[1.0625rem]"></i>
                                        </div>
                                        <div class="ms-3 text-start">
                                            <h6 class="mb-1 font-medium">Contact</h6>
                                            <p class="mb-4">+125 254 3562</p>
                                        </div>
                                    </div>
                                    <div class="flex mb-2">
                                        <div class="contact-icon contact-icon-4 border !border-warning bg-warning/10">
                                            <i class="fe fe-airplay !text-warning text-[1.0625rem]"></i>
                                        </div>
                                        <div class="ms-3 text-start">
                                            <h6 class="mb-1 font-medium">Working Hours</h6>
                                            <p class="mb-0">Mon - Fri: 9am - 6pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-8 col-span-12">
                            <div class="card bg-white dark:bg-bodybg !shadow-none rounded-sm">
                                <div class="box-body px-[3rem] py-[2.4rem]">
                                    <div class="grid grid-cols-12 gap-x-6 mt-1 mb-3">
                                        <div class="xl:col-span-6 col-span-12">
                                            <div class="form-group">
                                                <label for="cusName" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cusName" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="xl:col-span-6 col-span-12">
                                            <div class="form-group">
                                                <label for="cusEmail" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cusEmail" placeholder="Enter your email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cusMessage" class="form-label">Message <span class="text-danger">*</span></label>
                                        <textarea rows="4" class="form-control" id="cusMessage" placeholder="Type your message here..."></textarea>
                                    </div>
                                    <div class="form-group mb-2 pt-1">
                                        <button class="ti-btn ti-btn-primary-full">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <section class="section landing-footer text-white text-[0.813rem] opacity-[0.87]">
                <div class="container">
                    <div class="grid grid-cols-12 gap-x-6">
                        <div class="xl:col-span-4 lg:col-span-4 col-span-12">
                            <div class="px-6">
                                <p class="font-semibold mb-4">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('backend/assets/images/brand-logos/desktop-dark.png') }}" alt="">
                                    </a>
                                </p>
                                <p class="mb-2 opacity-[0.6] font-normal">A powerful admin dashboard to help you manage your business efficiently and effectively.</p>
                            </div>
                        </div>
                        <div class="xl:col-span-2 lg:col-span-2 col-span-12">
                            <div class="px-6">
                                <h6 class="font-semibold text-[1rem] mb-4">PAGES</h6>
                                <ul class="list-unstyled opacity-[0.6] font-normal landing-footer-list">
                                    <li><a href="#home" class="text-white">Home</a></li>
                                    <li><a href="#features" class="text-white">Features</a></li>
                                    <li><a href="#about" class="text-white">About</a></li>
                                    <li><a href="#statistics" class="text-white">Statistics</a></li>
                                    <li><a href="#testimonials" class="text-white">Testimonials</a></li>
                                    <li><a href="#contact" class="text-white">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="xl:col-span-2 lg:col-span-2 col-span-12">
                            <div class="px-6">
                                <h6 class="font-semibold text-[1rem] mb-2">QUICK LINKS</h6>
                                <ul class="list-unstyled opacity-[0.6] font-normal landing-footer-list">
                                    @guest
                                        <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                                    @else
                                        <li><a href="{{ url('/dashboard') }}" class="text-white">Dashboard</a></li>
                                        <li><a href="{{ url('/users') }}" class="text-white">Users</a></li>
                                        <li><a href="{{ url('/subjects') }}" class="text-white">Subjects</a></li>
                                        <li><a href="{{ url('/enrollments') }}" class="text-white">Enrollments</a></li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                        <div class="xl:col-span-4 lg:col-span-4 col-span-12">
                            <div class="px-6">
                                <h6 class="font-semibold text-[1rem] mb-2">CONTACT</h6>
                                <ul class="list-unstyled font-normal landing-footer-list">
                                    <li><a href="javascript:void(0);" class="text-white opacity-[0.6]"><i class="ri-home-4-line me-1 align-middle"></i> New York, NY 10012, US</a></li>
                                    <li><a href="javascript:void(0);" class="text-white opacity-[0.6]"><i class="ri-mail-line me-1 align-middle"></i> info@fmail.com</a></li>
                                    <li><a href="javascript:void(0);" class="text-white opacity-[0.6]"><i class="ri-phone-line me-1 align-middle"></i> +(555)-1920 1831</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="text-center landing-main-footer py-3">
                <span class="text-muted font-normal fs-15 opacity-[0.5]">{{ config('app.name') }} ©<span id="year"></span>. All rights reserved.</span>
            </div>

        </div>
        <!-- End::main-content -->

    </div>

    <!-- Scripts -->
    <script src="{{ asset('backend/assets/js/swiper.js') }}"></script>
    <script src="{{ asset('backend/assets/js/landing.js') }}"></script>
    <script src="{{ asset('backend/assets/js/defaultmenu.min.js') }}"></script>
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>

</body>
</html>
