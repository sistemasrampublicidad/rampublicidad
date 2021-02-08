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
                                <h3>Contenido</h3>
                                <ul class="no-list-style">
                                    <li><a href="{{route('show.all_logos')}}"><i class="fal fa-chart-line"></i>Todos mis Logos</a></li>
                                    <li><a href="{{route('show.all_planners')}}"><i class="fal fa-rss"></i>Todos mis Planners <span>7</span></a>
                                    </li>
                                    <li><a href="{{route('show.all_customers')}}"><i class="fal fa-rss"></i>Todos los Clientes <span>7</span></a>
                                    </li>
                                    <li><a href=""><i class="fal fa-rss"></i>Todos los Colaboradores <span>7</span></a>
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
                        <h3>Clientes</h3>
                    </div>
                    <div class="dashboard-list-box  fl-wrap">
                        <!-- dashboard-list -->
                        @foreach($customers as $customer)
                        <div class="dashboard-list fl-wrap">
                            <div class="dashboard-message-text">
                                <div class="single-slider fl-wrap">
                                    <div
                                        class="swiper-container-horizontal swiper-container-autoheight"
                                    >
                                        <div class="swiper-wrapper lightgallery"
                                        >
                                            <div class="swiper-slide hov_zoom swiper-slide-active"
                                                 data-swiper-slide-index="0"
                                                 >

                                                <img src="{{asset($customer['avatar'])}}"
                                                     alt="">
                                                <a href="{{asset($customer['avatar'])}}"
                                                   class="box-media-zoom  popup-image"><i
                                                        class="fal fa-search"></i></a>



                                                <h4><a href="listing-single.html">{{$customer['name']}}</a></h4>
                                            </div>
                                        </div>
                                        <span class="swiper-notification" aria-live="assertive"
                                              aria-atomic="true"></span>
                                    </div>
                                </div>
                                {{--                                        <img id="myImg" src="{{asset($logo['path'])}}" alt="">--}}

                            </div> 
                            
                            
                            
                            {{-- <div class="dashboard-message">
                                <div class="booking-list-contr">
                                    <a href="{{route('show.customers',$customer['id'])}}" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i
                                            class="fal fa-edit"></i></a>
                                    <a href="#" class="red-bg tolt" data-microtip-position="left" data-tooltip="Delete"><i
                                            class="fal fa-trash"></i></a>
                                </div>
                                <div class="dashboard-message-text">
                                    <div class="single-slider fl-wrap">
                                        <div
                                            class="swiper-container-horizontal swiper-container-autoheight"
                                        >
                                            <div class="swiper-wrapper lightgallery"
                                            >
                                                <div class="swiper-slide hov_zoom swiper-slide-active"
                                                     data-swiper-slide-index="0"
                                                     >

                                                
                                                         <img src="{{asset('/storage/administrator/uploads/avatars/'.$customer['avatar'])}}" alt="">

                                                         
                                                    <h4><a href="listing-single.html">{{$customer['name']}}</a></h4>
                                                    <div class="geodir-category-location clearfix"><a
                                                            href="#"> {{$customer['phone_representative']}}</a></div>

                                                </div>
                                            </div>
                                            <span class="swiper-notification" aria-live="assertive"
                                                  aria-atomic="true"></span>
                                        </div>
                                    </div>
<<<<<<< HEAD
                                </div>
                            </div>
=======
                            </div> --}}
>>>>>>> baa0bb6041371e554054510d793fabb7b5aacf6d
                        </div>
                        @endforeach
                    </div>
                    <!-- dashboard-list-box end-->
                    <div class="pagination fwmpag">
                        {{ $customers->render() }}
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
