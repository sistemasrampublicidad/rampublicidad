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
                    <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="{{route('show.all_customers')}}">Regresar al menú<i class="fas fa-caret-up"></i></a>

                    <div class="clearfix"></div>
                </div>
                <!-- dashboard-menu  end-->
                <!-- dashboard content-->
                <div class="col-md-9">
                    <div class="dashboard-title   fl-wrap">
                        <h3>Información del cliente</h3>
                    </div>
                    <form method="POST" action="{{ route('update.customer') }}" accept-charset="UTF-8"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="profile-edit-container fl-wrap block_box">
                            <div class="custom-form">
                                <div class="row">
                                    <input type="hidden" name="customer_id" value="{{$customer['id']}}">
                                    <div class="col-sm-6">
                                        <label>Nombre Empresa <span>*</span><i class="fal fa-user"></i></label>
                                        <input type="text" name="name" placeholder="Escribe el nombre de la empresa"
                                            value="{{$customer['name']}}" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Ruc<i class="far fa-envelope"></i> </label>
                                        <input type="text" name="ruc" placeholder="Escribe el ruc de la empresa"
                                            value="{{$customer['document']}}" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Correo de Empresa<i class="far fa-envelope"></i> </label>
                                        <input type="email" name="email" placeholder="Escribe el correo de la empresa"
                                            value="{{$customer['email']}}" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Nombre Representante <span>*</span><i class="far fa-phone"></i> </label>
                                        <input type="text" name="name_representative"
                                            placeholder="Escribe el nombre del representante" value="{{$customer['name_representative']}}" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Teléfono Representante <span>*</span><i class="far fa-phone"></i>
                                        </label>
                                        <input type="text" name="phone_representative" placeholder="(+51) 987654321" value="{{$customer['phone_representative']}}" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Website <i class="far fa-globe"></i> </label>
                                        <input type="text" name="website" placeholder="Escribe la web de la empresa" value="{{$customer['website']}}" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label> Password <i class="far fa-lock"></i> </label>
                                        <input type="password" name="password"  placeholder="Escribe la nueva contraseña"  />
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
                                        <input type="text" name="facebook" placeholder="https://www.facebook.com/" value="{{$customer['facebook']}}" />
                                        <label> Instagram <i class="fab fa-instagram"></i> </label>
                                        <input type="text" name="instagram" placeholder="https://www.instagram.com/" value="{{$customer['instagram']}}" />
                                        <label> Linkein <i class="fab fa-linkedin"></i> </label>
                                        <input type="text" name="linkendin" placeholder="https://www.linkendin.com/" value="{{$customer['linkendin']}}" />
                                        <button class="btn    color2-bg  float-btn">Guardar Cliente<i
                                                class="fal fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--  section  end-->
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--content end-->
</div>

@include('layouts.footer')
