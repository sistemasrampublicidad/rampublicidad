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
                            <img src="{{asset('/storage/administrator/uploads/avatars/'.auth()->user()->avatar)}}" alt="">
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
                <div class="circle_bg-bal circle_bg-bal_versmall"
                     data-scrollax="properties: { translateY: '-350px' }"></div>
            </div>
            <div class="circle-wrap" style="right:55%;top:90px;">
                <div class="circle_bg-bal circle_bg-bal_versmall"
                     data-scrollax="properties: { translateY: '-350px' }"></div>
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
                                    Contenido
                                </h3>
                                <ul class="no-list-style">
                                    <li><a href="{{route('show.all_logos')}}"><i class="fal fa-chart-line"></i>Todos mis Logos</a></li>
                                    <li><a href="dashboard-feed.html"><i class="fal fa-rss"></i>Todos mis Planners <span>7</span></a>
                                    </li>
                                    <li><a href="{{route('show.all_customers')}}"><i class="fal fa-rss"></i>Todos los Clientes <span>7</span></a>
                                    </li>
                                    <li><a href=""><i class="fal fa-rss"></i>Todos los Colaboradores <span>7</span></a>
                                    </li>
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
                        <h3>Información del cliente</h3>
                    </div>
                    <form method="POST" action="{{ route('store.customer') }}" accept-charset="UTF-8"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="profile-edit-container fl-wrap block_box">
                            <div class="custom-form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nombre Empresa <span>*</span><i class="fal fa-user"></i></label>
                                        <input type="text" name="name" placeholder="Escribe el nombre de la empresa"
                                            value="" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Ruc<i class="far fa-envelope"></i> </label>
                                        <input type="text" name="ruc" placeholder="Escribe el ruc de la empresa"
                                            value="" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Correo de Empresa<i class="far fa-envelope"></i> </label>
                                        <input type="email" name="email" placeholder="Escribe el correo de la empresa"
                                            value="" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Nombre Representante <span>*</span><i class="far fa-phone"></i> </label>
                                        <input type="text" name="name_representative"
                                            placeholder="Escribe el nombre del representante" value="" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Teléfono Representante <span>*</span><i class="far fa-phone"></i>
                                        </label>
                                        <input type="text" name="phone_representative" placeholder="(+51) 987654321" value="" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Website <i class="far fa-globe"></i> </label>
                                        <input type="text" name="website" placeholder="Escribe la web de la empresa" value="" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Password <i class="far fa-lock"></i> </label>
                                        <input type="password" name="password" placeholder="Escribe la contraseña" value="" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Logo <span>*</span> </label>
                                        <div class="add-list-media-wrap fuzone">
                                            <div class="fu-text">
                                                <span><i class="fal fa-image"></i> Click aquí o arrastre la
                                                    imagen</span>
                                                <span class="photoUpload-files fl-wrap"></span>
                                            </div>
                                            <input type="file" class="form-control" name="avatar">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Facebook <i class="fab fa-facebook"></i></label>
                                        <input type="text" name="facebook" placeholder="https://www.facebook.com/" value="" />
                                        <label> Instagram <i class="fab fa-instagram"></i> </label>
                                        <input type="text" name="instagram" placeholder="https://www.instagram.com/" value="" />
                                        <label> Linkein <i class="fab fa-linkedin"></i> </label>
                                        <input type="text" name="linkendin" placeholder="https://www.linkendin.com/" value="" />
                                        <button class="btn    color2-bg  float-btn">Guardar Cliente<i
                                                class="fal fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
