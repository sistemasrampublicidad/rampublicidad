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
                    <div class="listing-item-container init-grid-items fl-wrap nocolumn-lic">
                        @foreach($planners as $planner)

                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img">
                                    <a href="{{ route('edit.post', $planner['planner_id']) }}">
                                        <div class="geodir-js-favorite_btn"><i class="fal fa-edit"></i><span>Editar</span></div>
                                    </a>
                                    <a href="listing-single.html" class="geodir-category-img-wrap fl-wrap">
                                        <img src="{{ asset('/storage/administrator/uploads/planners/'.$planner['path']) }}" alt="">

                                </a>
                                @if($planner['is_approved'] == 'yes')
                                <div class="geodir_status_date gsd_close"><i class="fal fa-lock"></i>Aprobado</div>
                                @else
                                <div class="geodir_status_date gsd_open"><i class="fal fa-lock-open"></i>Esperando</div>
                                @endif
                                </div>
                                <div class="geodir-category-content fl-wrap title-sin_item">
                                    <div class="geodir-category-content-title fl-wrap">
                                        <div class="geodir-category-content-title-item">
                                            <h3 class="title-sin_map"><a href="listing-single.html">{{$planner['post_reason']}}</a><span class="verified-badge"><i class="fal fa-check"></i></span></h3>
                                            <div class="geodir-category-location fl-wrap"><a href="#" ><i class="fas fa-calendar-day"></i>Fecha: {{$planner['created_at']}}</a></div>
                                            <div class="geodir-category-location fl-wrap"><a href="#" ><i class="fab fa-{{$planner['platform']}}"></i>Plataforma: {{$planner['platform']}}</a></div>
                                            <div class="geodir-category-location fl-wrap"><a href="#" ><i class="fas fa-share-alt"></i>Extensión: {{$planner['extension']}}</a></div>
                                        </div>
                                    </div>
                                    <div class="geodir-category-text fl-wrap">
                                        <p class="small-text">{!!$planner['caption']!!}</p>
                                        <div class="facilities-list fl-wrap">
                                            {{-- <div class="facilities-list-title">Facilities : </div>
                                            <ul class="no-list-style">
                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Free WiFi"><i class="fal fa-wifi"></i></li>
                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Parking"><i class="fal fa-parking"></i></li>
                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Non-smoking Rooms"><i class="fal fa-smoking-ban"></i></li>
                                                <li class="tolt"  data-microtip-position="top" data-tooltip="Pets Friendly"><i class="fal fa-dog-leashed"></i></li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                    <div class="geodir-category-footer fl-wrap">
                                        @empty(!$comments)
                                        <div class="chat-box-2 fl-wrap">
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
                                        <form method="POST" action="{{ route('store.my.comments.post') }}"
                                        accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf
                                        <div class="chat-widget_input fl-wrap">
                                            <input type="hidden" name="id_logo" value="{{ $planner['planner_id'] }}">
                                            <input type="hidden" name="type" value="chat-message_guest">
                                            <textarea name="comment" placeholder="Escriba un comentario"
                                                required></textarea>
                                            <button type="submit"><i class="fal fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
           
                    </div>
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
