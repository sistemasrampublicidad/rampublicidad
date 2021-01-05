@include('layouts.header')

<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
            <div class="container">
                <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                    <h1>Welcome  : <span>{{ auth()->user()->name }}</span></h1>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="dashboard-header fl-wrap">
                <div class="container">
                    <div class="dashboard-header_conatiner fl-wrap">
                        <div class="dashboard-header-avatar">
                            <img src="images/avatar/1.jpg" alt="">
                            <a href="dashboard-myprofile.html" class="color-bg edit-prof_btn"><i class="fal fa-edit"></i></a>
                        </div>
                        <div class="dashboard-header-stats-wrap">
                            <div class="dashboard-header-stats">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <!--  dashboard-header-stats-item -->
                                        <div class="swiper-slide">
                                            <div class="dashboard-header-stats-item">
                                                <i class="fal fa-map-marked"></i>
                                                Active Listings
                                                <span>21</span>
                                            </div>
                                        </div>
                                        <!--  dashboard-header-stats-item end -->
                                        <!--  dashboard-header-stats-item -->
                                        <div class="swiper-slide">
                                            <div class="dashboard-header-stats-item">
                                                <i class="fal fa-chart-bar"></i>
                                                Listing Views
                                                <span>1054</span>
                                            </div>
                                        </div>
                                        <!--  dashboard-header-stats-item end -->
                                        <!--  dashboard-header-stats-item -->
                                        <div class="swiper-slide">
                                            <div class="dashboard-header-stats-item">
                                                <i class="fal fa-comments-alt"></i>
                                                Total Reviews
                                                <span>79</span>
                                            </div>
                                        </div>
                                        <!--  dashboard-header-stats-item end -->
                                        <!--  dashboard-header-stats-item -->
                                        <div class="swiper-slide">
                                            <div class="dashboard-header-stats-item">
                                                <i class="fal fa-heart"></i>
                                                Times Bookmarked
                                                <span>654</span>
                                            </div>
                                        </div>
                                        <!--  dashboard-header-stats-item end -->
                                    </div>
                                </div>
                            </div>
                            <!--  dashboard-header-stats  end -->
                            <div class="dhs-controls">
                                <div class="dhs dhs-prev"><i class="fal fa-angle-left"></i></div>
                                <div class="dhs dhs-next"><i class="fal fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
            <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
            <div class="circle-wrap" style="left:120px;bottom:120px;" data-scrollax="properties: { translateY: '-200px' }">
                <div class="circle_bg-bal circle_bg-bal_small"></div>
            </div>
            <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
                <div class="circle_bg-bal circle_bg-bal_middle"></div>
            </div>
            <div class="circle-wrap" style="right:40%;top:-10px;"  >
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
            </div>
            <div class="circle-wrap" style="right:55%;top:90px;"  >
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
            </div>
        </section>
        <!--  section  end-->
        <!--  section  -->
        <section class="gray-bg main-dashboard-sec" id="sec1">
            <div class="container">
                <!--  dashboard-menu-->
                <div class="col-md-3">
                    <div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
                    <div class="clearfix"></div>
                    <div class="fixed-bar fl-wrap" id="dash_menu">
                        <div class="user-profile-menu-wrap fl-wrap block_box">
                            <!-- user-profile-menu-->
                            <div class="user-profile-menu">
                                <h3>Contenido</h3>
                                <ul class="no-list-style">
                                    <li><a href="{{route('show.my_logos',auth()->user()->id)}}"><i class="fal fa-chart-line"></i>Mis Logos</a></li>
                                    <li><a href="dashboard-feed.html"><i class="fal fa-rss"></i>Planners <span>7</span></a></li>
                                </ul>
                            </div>
                            <button class="logout_btn color2-bg">Log Out <i class="fas fa-sign-out"></i></button>
                        </div>
                    </div>
                    <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="{{route('administrator')}}">Regresar al menú<i class="fas fa-caret-up"></i></a>
                    <div class="clearfix"></div>
                </div>
                <!-- dashboard-menu  end-->
                <!-- dashboard content-->
                <div class="col-md-9">
                    <div class="dashboard-title   fl-wrap">
                        <h3>Tus proyectos</h3>
                    </div>
                    <!-- dashboard-list-box-->
                    <div class="dashboard-list-box  fl-wrap">
                        <!-- dashboard-list -->
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message">
                                <div class="booking-list-contr">
                                    <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i class="fal fa-edit"></i></a>
                                    <a href="#" class="red-bg tolt" data-microtip-position="left" data-tooltip="Delete"><i class="fal fa-trash"></i></a>
                                </div>
                                <div class="dashboard-message-text">
                                    <img src="images/all/1.jpg" alt="">
                                    <h4><a href="listing-single.html">Luxary Resaturant</a></h4>
                                    <div class="geodir-category-location clearfix"><a href="#"> 40 Journal Square Plaza, NJ,  USA</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- dashboard-list end-->
                        <!-- dashboard-list -->
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message">
                                <div class="booking-list-contr">
                                    <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i class="fal fa-edit"></i></a>
                                    <a href="#" class="red-bg tolt" data-microtip-position="left" data-tooltip="Delete"><i class="fal fa-trash"></i></a>
                                </div>
                                <div class="dashboard-message-text">
                                    <img src="images/all/1.jpg" alt="">
                                    <h4><a href="listing-single.html">Handmade Shop</a></h4>
                                    <div class="geodir-category-location clearfix"><a href="#">  34-42 Montgomery St , NY, USA</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- dashboard-list end-->
                        <!-- dashboard-list -->
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message">
                                <div class="booking-list-contr">
                                    <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i class="fal fa-edit"></i></a>
                                    <a href="#" class="red-bg tolt" data-microtip-position="left" data-tooltip="Delete"><i class="fal fa-trash"></i></a>
                                </div>
                                <div class="dashboard-message-text">
                                    <img src="images/all/1.jpg" alt="">
                                    <h4><a href="listing-single.html">Iconic Cafe in Manhattan</a></h4>
                                    <div class="geodir-category-location clearfix"><a href="#">  40 Journal Square Plaza, NJ, USA</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- dashboard-list end-->
                        <!-- dashboard-list -->
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message">
                                <div class="booking-list-contr">
                                    <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i class="fal fa-edit"></i></a>
                                    <a href="#" class="red-bg tolt" data-microtip-position="left" data-tooltip="Delete"><i class="fal fa-trash"></i></a>
                                </div>
                                <div class="dashboard-message-text">
                                    <img src="images/all/1.jpg" alt="">
                                    <h4><a href="listing-single.html">Premium Fitness Gym</a></h4>
                                    <div class="geodir-category-location clearfix"><a href="#">  W 85th St, New York, USA</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- dashboard-list end-->
                        <!-- dashboard-list -->
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message">
                                <div class="booking-list-contr">
                                    <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i class="fal fa-edit"></i></a>
                                    <a href="#" class="red-bg tolt" data-microtip-position="left" data-tooltip="Delete"><i class="fal fa-trash"></i></a>
                                </div>
                                <div class="dashboard-message-text">
                                    <img src="images/all/1.jpg" alt="">
                                    <h4><a href="listing-single.html">MontePlaza Hotel</a></h4>
                                    <div class="geodir-category-location clearfix"><a href="#">  70 Bright St New York, USA</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- dashboard-list end-->
                    </div>
                    <!-- dashboard-list-box end-->
                    <div class="pagination">
                        <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>
                        <a href="#">1</a>
                        <a href="#" class="current-page">2</a>
                        <a href="#">3</a>
                        <a href="#">...</a>
                        <a href="#">7</a>
                        <a href="#" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
                <!-- dashboard content end-->
            </div>
        </section>
        <!--  section  end-->
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>

@include('layouts.footer')
