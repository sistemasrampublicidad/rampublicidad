<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Ram Publicidad</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== token  ===============-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('template/css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('template/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('template/css/color.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('template/css/dashboard-style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q==" crossorigin="anonymous" /><script type='text/javascript' src='js/moment.min.js'></script>


    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="loader-inner">
        <div class="loader-inner-cirle"></div>
    </div>
</div>
<!--loader end-->
<!-- main start  -->
<div id="main">
    <!-- header -->
    <header class="main-header">
        <a href="index.html" class="logo-holder"><img src="images/logo.png" alt=""></a>
        @guest
            <div class="show-reg-form modal-open avatar-img" data-srcav="images/avatar/3.jpg"><i
                    class="fal fa-user"></i>Iniciar Sesión
            </div>
        @else
            @if (auth()->user()->role_id == 1)
                <a href="{{ route('show.all_customers') }}" class="add-list color-bg">Panel de control <span><i
                            class="fal fa-layer-plus"></i></span></a>
            @endif

            @if (auth()->user()->role_id == 2)
                <a href="{{ route('show.all_customers') }}" class="add-list color-bg">Panel de control <span><i
                            class="fal fa-layer-plus"></i></span></a>
            @endif

            @if (auth()->user()->role_id == 3)
                <a href="{{ route('administrator') }}" class="add-list color-bg">Panel de control <span><i
                            class="fal fa-layer-plus"></i></span></a>
            @endif
            @if (auth()->user()->role_id == 4)
                <a href="{{ route('customers.index') }}" class="add-list color-bg">Recursos<span><i
                            class="fal fa-layer-plus"></i></span></a>
            @endif
            <div class="show-reg-form modal-open avatar-img" data-srcav=""><i class="fal fa-user"></i>
                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        @endguest
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <div class="nav-holder main-menu">
            <nav>
                <ul class="no-list-style">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('servicios') }}">Servicios</a>
                    </li>
                    <li>
                        <a href="{{ url('portafolio') }}">Portafolio</a>
                    </li>
                    <li>
                        <a href="{{ url('contacto') }}">Contacto</a>
                    </li>

                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
        <!-- header-search_container -->
        <div class="header-search_container header-search vis-search">
            <div class="container small-container">
                <div class="header-search-input-wrap fl-wrap">
                    <!-- header-search-input -->
                    <div class="header-search-input">
                        <label><i class="fal fa-keyboard"></i></label>
                        <input type="text" placeholder="What are you looking for ?" value="" />
                    </div>
                    <!-- header-search-input end -->
                    <!-- header-search-input -->
                    <div class="header-search-input location autocomplete-container">
                        <label><i class="fal fa-map-marker"></i></label>
                        <input type="text" placeholder="Location..." class="autocomplete-input" id="autocompleteid2"
                            value="" />
                        <a href="#"><i class="fal fa-dot-circle"></i></a>
                    </div>
                    <!-- header-search-input end -->
                    <!-- header-search-input -->
                    <div class="header-search-input header-search_selectinpt ">
                        <select data-placeholder="Category" class="chosen-select no-radius">
                            <option>All Categories</option>
                            <option>All Categories</option>
                            <option>Shops</option>
                            <option>Hotels</option>
                            <option>Restaurants</option>
                            <option>Fitness</option>
                            <option>Events</option>
                        </select>
                    </div>
                    <!-- header-search-input end -->
                    <button class="header-search-button green-bg" onclick="window.location.href='listing.html'"><i
                            class="far fa-search"></i> Search
                    </button>
                </div>
                <div class="header-search_close color-bg"><i class="fal fa-long-arrow-up"></i></div>
            </div>
        </div>
        <!-- header-search_container  end -->
        <!-- wishlist-wrap-->
        <div class="header-modal novis_wishlist">
            <!-- header-modal-container-->
            <div class="header-modal-container scrollbar-inner fl-wrap" data-simplebar>
                <!--widget-posts-->
                <div class="widget-posts  fl-wrap">
                    <ul class="no-list-style">
                        <li>
                            <div class="widget-posts-img"><a href="listing-single.html"><img
                                        src="images/gallery/thumbnail/1.png" alt=""></a>
                            </div>
                            <div class="widget-posts-descr">
                                <h4><a href="listing-single.html">Iconic Cafe</a></h4>
                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                            class="fas fa-map-marker-alt"></i> 40 Journal Square Plaza, NJ, USA</a>
                                </div>
                                <div class="widget-posts-descr-link"><a href="listing.html">Restaurants </a> <a
                                        href="listing.html">Cafe</a></div>
                                <div class="widget-posts-descr-score">4.1</div>
                                <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                            </div>
                        </li>
                        <li>
                            <div class="widget-posts-img"><a href="listing-single.html"><img
                                        src="images/gallery/thumbnail/1.png" alt=""></a>
                            </div>
                            <div class="widget-posts-descr">
                                <h4><a href="listing-single.html">MontePlaza Hotel</a></h4>
                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                            class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA </a></div>
                                <div class="widget-posts-descr-link"><a href="listing.html">Hotels </a></div>
                                <div class="widget-posts-descr-score">5.0</div>
                                <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                            </div>
                        </li>
                        <li>
                            <div class="widget-posts-img"><a href="listing-single.html"><img
                                        src="images/gallery/thumbnail/1.png" alt=""></a>
                            </div>
                            <div class="widget-posts-descr">
                                <h4><a href="listing-single.html">Rocko Band in Marquee Club</a></h4>
                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                            class="fas fa-map-marker-alt"></i>75 Prince St, NY, USA</a></div>
                                <div class="widget-posts-descr-link"><a href="listing.html">Events</a></div>
                                <div class="widget-posts-descr-score">4.2</div>
                                <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                            </div>
                        </li>
                        <li>
                            <div class="widget-posts-img"><a href="listing-single.html"><img
                                        src="images/gallery/thumbnail/1.png" alt=""></a>
                            </div>
                            <div class="widget-posts-descr">
                                <h4><a href="listing-single.html">Premium Fitness Gym</a></h4>
                                <div class="geodir-category-location fl-wrap"><a href="#"><i
                                            class="fas fa-map-marker-alt"></i> W 85th St, New York, USA</a></div>
                                <div class="widget-posts-descr-link"><a href="listing.html">Fitness</a> <a
                                        href="listing.html">Gym</a></div>
                                <div class="widget-posts-descr-score">5.0</div>
                                <div class="clear-wishlist"><i class="fal fa-times-circle"></i></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- widget-posts end-->
            </div>
            <!-- header-modal-container end-->
            <div class="header-modal-top fl-wrap">
                <h4>Your Wishlist : <span><strong></strong> Locations</span></h4>
                <div class="close-header-modal"><i class="far fa-times"></i></div>
            </div>
        </div>
        <!--wishlist-wrap end -->
    </header>