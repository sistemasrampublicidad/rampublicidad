@include('layouts.header')

<div id="wrapper">
    <!-- content-->
    <div class="content">
        <!--  section  -->
        @include('layouts.sub_header')

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
                                    {{$customer['name']}}
                                </h3>
                                <ul class="no-list-style">
                                    <li><a href="{{route('show.logos',$customer['id'])}}"><i class="fal fa-chart-line"></i>Logos</a></li>
                                    <li><a href="{{route('show.planners',$customer['id'])}}"><i class="fal fa-rss"></i>Planners <span>7</span></a>
                                    </li>
                                </ul>
                            </div>
<a href="{{ route('logout') }}" class="logout_btn color2-bg"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>                        </div>
                    </div>
                    <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="{{route('show.all_customers')}}">Regresar al menú<i class="fas fa-caret-up"></i></a>

                    <div class="clearfix"></div>
                </div>
                <!-- dashboard-menu  end-->
                <!-- dashboard content-->
                <div class="col-md-9">
                    <div class="dashboard-title   fl-wrap">
                        <h3>Planners </h3>
                        <a href="{{ route('add.planner', $customer['id']) }}" class=" brd-show-share color2-bg"
                        data-tooltip="Agregar">Agregar planner<i class="fal fa-plus"></i></a>
                    </div>
                    <div class="dashboard-list-box  fl-wrap">

                        @foreach ($planners as $planner)
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message">
                                <div class="booking-list-contr">
                                    <a href="" class="color-bg tolt aaaa-open-planner" data-microtip-position="left"
                                        data-tooltip="Visualizar" data-tittle="{{$planner['planner_id']}}"><i class="fal fa-expand-arrows-alt"></i></a>
                                    <a href="/download_planners/{{ $planner['path'] }}" class="color-bg tolt"
                                        data-microtip-position="left" data-tooltip="Descargar"><i
                                            class="fal fa-download"></i></a>
                                            <a href="{{ route('edit.planner', $planner['planner_id']) }}" class="color-bg tolt"
                                            data-microtip-position="left" data-tooltip="Editar"><i
                                                class="fal fa-edit"></i></a>
                                        <a href="{{ route('delete.planner', $planner['planner_id']) }}" class="red-bg tolt" data-microtip-position="left"
                                            data-tooltip="Eliminar"><i class="fal fa-trash"></i></a>
                                </div>
                                <div class="dashboard-message-text">
                                    <div class="single-slider fl-wrap">
                                        <div class="swiper-container-horizontal swiper-container-autoheight">
                                            <div class="swiper-wrapper lightgallery">
                                                <div class="swiper-slide hov_zoom swiper-slide-active"
                                                    data-swiper-slide-index="0">
                                                    <h4><a href="listing-single.html">{{ $planner['name'] }}</a></h4>
                                                    <div class="geodir-category-location clearfix"><a href="#">
                                                            {{ $planner['description'] }}<br>{{ $planner['created_at'] }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="swiper-notification" aria-live="assertive"
                                                aria-atomic="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                      

                    </div>
                    <!-- dashboard-list-box end-->
                    {{--                    <div class="pagination">--}}
                    {{--                        <a href="#" class="prevposts-link"><i class="fas fa-caret-left"></i><span>Prev</span></a>--}}
                    {{--                        <a href="#">1</a>--}}
                    {{--                        <a href="#" class="current-page">2</a>--}}
                    {{--                        <a href="#">3</a>--}}
                    {{--                        <a href="#">...</a>--}}
                    {{--                        <a href="#">7</a>--}}
                    {{--                        <a href="#" class="nextposts-link"><span>Next</span><i class="fas fa-caret-right"></i></a>--}}
                    {{--                    </div>--}}
                </div>
                <!-- dashboard content end-->
            </div>
        </section>
    </div>
    <!--content end-->
</div>
<div class="main-register-wrap modal_view_planner">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register fl-wrap  modal_view_planner_main">
            <div class="main-register_title">Documento <span><strong></strong></span></div>
            <div class="close-reg"><i class="fal fa-times"></i></div>
            <div class="tabs-container">
                <div class="soc-log fl-wrap">
                    <div class="img_logo fl-wrap"><span></span></div>
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
