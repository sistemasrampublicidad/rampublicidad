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
                                    Contenido
                                </h3>
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
