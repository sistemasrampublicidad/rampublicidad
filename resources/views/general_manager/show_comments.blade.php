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
                                    {{ $customer['name'] }}
                                </h3>
                                <ul class="no-list-style">
                                    <li><a href="{{ route('show.logos', $customer['id']) }}"><i
                                                class="fal fa-chart-line"></i>Logos</a></li>
                                    <li><a href="{{ route('show.planners', $customer['id']) }}"><i
                                                class="fal fa-rss"></i>Planners <span>7</span></a>
                                    </li>
                                </ul>
                            </div>
<a href="{{ route('logout') }}" class="logout_btn color2-bg"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>                        </div>
                    </div>
                    <a class="back-tofilters color2-bg custom-scroll-link fl-wrap"
                        href="{{ route('show.all_customers') }}">Regresar al menú<i class="fas fa-caret-up"></i></a>

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
                                                                class="chat-message-user-name cmun_sm">{{ $comment['name']}}</span>
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
                                                <input type="hidden" name="type" value="chat-message_user">
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
