<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dr Drehab</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Medical, Blogs, Rehabilitation, Pakistan, Physiotherapy" name="keywords">
    <meta
        content="Explore a wealth of medical blogs and books dedicated to rehabilitation on our website, empowering medical students with essential knowledge and insights. Dive into our curated resources to enhance your understanding and practice in rehabilitation medicine. Start your journey to becoming a knowledgeable and skilled medical professional today"
        name="description">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link href="{{ URL::asset('frontend/img/IMG_3816.PNG') }}" rel="icon">
    <link rel="stylesheet" href="{{ URL::asset('search.css') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

    <!-- Libraries Stylesheet -->
    <link href="{{ URL::asset('/frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ URL::asset('/frontend/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ URL::asset('css/font-awesome-pro.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ URL::asset('style.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ URL::asset('css/customize.css') }}" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        @media screen and (max-width: 991px) {
            .customStyle {
                border: none;
                outline: none;
                display: flex;
                align-items: center;

            }

            .searchBar {
                display: flex;
                left: -1px;
                top: 5px
            }
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-white small">
                                {{ date('l, F j, Y') }}
                            </a>
                        </li>

                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-white small">Advertise</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-white small">Contact</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        @if (isset($globalsetup) && count($globalsetup) > 0)
                            @foreach ($globalsetup as $global)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ $global->facebook ?? '' }}"
                                        target="_blank"><small class="fa fa-facebook"></small></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" target="_blank"
                                        href="{{ $global->linkedin ?? '' }}"><small
                                            class="fab fa-linkedin-in"></small></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" target="_blank"
                                        href="{{ $global->instagram ?? '' }}"><small
                                            class="fab fa-instagram"></small></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" target="_blank"
                                        href="{{ $global->youtube ?? '' }}"><small class="fab fa-youtube"></small></a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5 my-2">
            <div class="col-lg-4">
                @if ($globalsetup->isNotEmpty())
                    @foreach ($globalsetup as $logo)
                        @if ($logo->logo)
                            <a href="{{ url('/') }}" class="navbar-brand p-0 d-none d-lg-block">
                                <img class="img-fluid w-25" src="{{ asset('logo/' . $logo->logo) }}"
                                    alt="Logo Not found">
                            </a>
                        @else
                            <a href="{{ url('/') }}" class="navbar-brand p-0 d-none d-lg-block">
                                <h1 class="m-0  text-primary">{{ $logo->title }}<span
                                        class="text-dark font-weight-normal"></span></h1>
                            </a>
                        @endif
                    @endforeach
                @else
                    <a href="{{ url('/') }}" class="navbar-brand p-0 d-none d-lg-block">
                        <h1 class="m-0 text-uppercase text-primary">mymed<span
                                class="text-dark font-weight-normal">talks</span></h1>
                    </a>
                @endif


            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <a href="https://go.fiverr.com/visit/?bta=848997&nci=14909" rel="sponsored" Target="_Top"><img
                        src="https://fiverr.ck-cdn.com/tn/serve/?cid=29121885" width="728" height="96"></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <div class="container-fluid p-0 ">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <div class="d-flex my-2">
                <div class="navbar-toggler justify-content-between toggleBar customStyle">
                    <div class="row">
                        @if (count($globalsetup) > 0)
                            @foreach ($globalsetup as $logo)
                                @if ($logo->logo)
                                    <a href="{{ url('/') }}" class="navbar-brand p-0 d-block d-lg-block">
                                        <img style="
                                        width:15% !important;
                                        height:80%;
                                        border-radius: 50%;
                                        object-fit: cover;" class="img-fluid"

                                            src="{{ asset('logo/' . $logo->logo) }}" alt="">
                                    </a>
                                @else
                                    <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                                        <h1 class="m-0 display-4 text-uppercase text-primary">{{ $logo->title }}<span
                                                class="text-white font-weight-normal"></span></h1>
                                    </a>
                                @endif
                            @endforeach
                        @else
                            <a href="{{ url('/') }}" class="navbar-brand d-block d-lg-none">
                                <h1 class="m-0 display-4 text-uppercase text-primary">Dr Drehab</h1>
                            </a>
                        @endif
                    </div>
                    {{-- <button type="button" class="navbar-toggler justify-content-between" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>


            </div>
            <div class="collapse col-lg-12 navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ url('/') }}"
                        class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('TopBlogs') }}"
                        class="nav-item nav-link {{ Request::is('TopBlogs') ? 'active' : '' }}">Top Blogs</a>
                    <a href="{{ url('ebook') }}"
                        class="nav-item nav-link {{ Request::is('ebook') ? 'active' : '' }}">E-Books</a>
                    @if (isset($categories) && count($categories) > 0)
                        <div class="nav-item dropdown">
                            <a href="{{ route('category') }}" class="nav-link dropdown-toggle"
                                data-toggle="dropdown">Categories</a>
                            <div class="dropdown-menu rounded-0 m-0 categories-dropdown">

                                @foreach ($categories as $key => $category)
                                    @if ($key < 10)
                                        <a href="{{ url('category', ['custom_url' => $category->custom_url]) }}"
                                            class="dropdown-item">{{ $category->category }}</a>
                                    @endif
                                @endforeach


                            </div>
                        </div>
                    @endif

                    <a href="{{ url('Special') }}"
                        class="nav-item nav-link {{ Request::is('Special') ? 'active' : '' }}">Special Tests</a>

                    <a href="{{ asset('contact') }}"
                        class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <form action="{{ route('getSuggestions') }}" id="search-form">
                    <div class="input-group ml-auto  d-lg-flex" style="width: 100%; max-width: 400px;">

                        <input type="text" id="search-input" name="keyword"
                            style="width: 253px;
                        border-bottom-left-radius: 5px;
                        border-top-left-radius: 5px;"
                            class=" form-control border-0" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit"
                                style="
                            border-bottom-right-radius: 5px;
                            border-top-right-radius: 5px;"
                                class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </div>


                    </div>
                </form>

            </div>
        </nav>

        {{--  search results   --}}


    </div>
    <div class="searchRender" id="suggestion-container">
        <div class="searchBox searchBar" style="">
            <table class="table search-result" id="search-results">

            </table>
        </div>
    </div>
    <!-- Navbar End -->
