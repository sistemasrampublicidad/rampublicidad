@include('layouts.header')

<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!--  section  -->
        <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
            <div class="container">
                <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                    <h1>Bienvenido(a) : <span>{{ auth()->user()->name }}</span></h1>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="dashboard-header fl-wrap">
                <div class="container">
                    <div class="dashboard-header_conatiner fl-wrap">
                        <div class="dashboard-header-avatar">
                            <img src="{{ asset('/storage/administrator/uploads/avatars/' . auth()->user()->avatar) }}"
                                alt="">
                            <a href="dashboard-myprofile.html" class="color-bg edit-prof_btn"><i
                                    class="fal fa-edit"></i></a>
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
            <div class="circle-wrap" style="left:120px;bottom:120px;"
                data-scrollax="properties: { translateY: '-200px' }">
                <div class="circle_bg-bal circle_bg-bal_small"></div>
            </div>
            <div class="circle-wrap" style="right:420px;bottom:-70px;"
                data-scrollax="properties: { translateY: '150px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
                <div class="circle_bg-bal circle_bg-bal_big"></div>
            </div>
            <div class="circle-wrap" style="left:40%;bottom:-70px;">
                <div class="circle_bg-bal circle_bg-bal_middle"></div>
            </div>
            <div class="circle-wrap" style="right:40%;top:-10px;">
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }">
                </div>
            </div>
            <div class="circle-wrap" style="right:55%;top:90px;">
                <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }">
                </div>
            </div>
        </section>
        <!--  section  end-->
        <!--  section  -->
        <section class="gray-bg main-dashboard-sec" id="sec1">
            <div class="container">
                <!--  dashboard-menu-->
                <div class="col-md-3">
                    <div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard
                        menu
                    </div>
                    <div class="clearfix"></div>
                    <div class="fixed-bar fl-wrap" id="dash_menu">
                        <div class="user-profile-menu-wrap fl-wrap block_box">
                            <!-- user-profile-menu-->
                            <div class="user-profile-menu">
                                <h3>
                                    {{ $customer['name'] }}
                                </h3>
                                <ul class="no-list-style">
                                    <li><a href="{{ route('show.my_logos', $customer['id']) }}"><i
                                                class="fal fa-chart-line"></i>Logos</a></li>
                                    <li><a href="{{ route('show.planners', $customer['id']) }}"><i
                                                class="fal fa-rss"></i>Planners <span>7</span></a>
                                    </li>
                                </ul>
                            </div>
                            <button class="logout_btn color2-bg">Log Out <i class="fas fa-sign-out"></i></button>
                        </div>
                    </div>
                    <a class="back-tofilters color2-bg custom-scroll-link fl-wrap"
                        href="{{ route('administrator') }}">Regresar al menú<i class="fas fa-caret-up"></i></a>

                    <div class="clearfix"></div>
                </div>
                <!-- dashboard-menu  end-->
                <!-- dashboard content-->
                <div class="col-md-9">
                    <div class="dashboard-title   fl-wrap"> 
                        <h3>Comentarios </h3>
                    </div>
                    <div class="dashboard-list-box  fl-wrap">
                        <div class="dashboard-list-box fl-wrap">
                            <div class="chat-wrapper fl-wrap">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="list-single-main-media fl-wrap">
                                            <img src="{{ asset('/storage/administrator/uploads/logos/' . $logo['path']) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        @empty(!$comments)
                                            <div class="chat-box fl-wrap">
                                                @foreach ($comments as $comment)
                                                    <div class="chat-message {{ $comment['type'] }} fl-wrap">
                                                        <div class="dashboard-message-avatar">
                                                            <img src="{{ asset('/storage/administrator/uploads/avatars/' . $comment['avatar']) }}"
                                                                alt="">
                                                            <span
                                                                class="chat-message-user-name cmun_sm">{{ $comment['name'] }}</span>
                                                        </div>
                                                        <span class="massage-date">{{ $comment['created_at'] }}</span>
                                                        <p>{{ $comment['comment'] }}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endempty
                                        <form method="POST" action="{{ route('store.comments') }}"
                                            accept-charset="UTF-8" enctype="multipart/form-data">
                                            @csrf
                                            <div class="chat-widget_input fl-wrap">
                                                <input type="hidden" name="id_logo" value="{{ $logo['id'] }}">
                                                <input type="hidden" name="type" value="chat-message_guest">
                                                <textarea name="comment" placeholder="Escriba un comentario"
                                                    required></textarea>
                                                <button type="submit"><i class="fal fa-paper-plane"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- chat-contacts end-->
                                </div>
                            </div>
                            <!-- dashboard-list-box end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--content end-->
</div>
<!-- Modals -->
<div class="main-register-wrap modal_view_logo">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_view_logo_main">
            <div class="main-register_title">Logo <span><strong>test</strong>test<strong>.</strong></span></div>
            <div class="close-reg"><i class="fal fa-times"></i></div>
            <!--tabs -->
            <div class="tabs-container">
                <div class="soc-log fl-wrap">
                    <img src="{{ asset('/storage/administrator/uploads/logos/cliente_4_number1.png') }}" class="respimg"
                        alt="">
                    <div class="log-separator fl-wrap"><span></span></div>
                    <a href="#" class="facebook-log"><i class="fas fa-download"></i> Descargar</a>
                </div>
                <div class="wave-bg">
                    <div class='wave -one'></div>
                    <div class='wave -two'></div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
