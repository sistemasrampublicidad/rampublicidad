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
                            </a>
                    <div class="clearfix"></div>
                </div>
                <!-- dashboard-menu  end-->
                <!-- dashboard content-->
                <div class="col-md-9">
                    <div class="dashboard-title   fl-wrap">
                        <h3>Editar Planner </h3>
                    </div>
                    <form method="POST" action="{{ route('update.planner') }}" accept-charset="UTF-8"
                          enctype="multipart/form-data" >
                        @csrf
                        <div class="profile-edit-container fl-wrap block_box ">
                            <div class="custom-form">
                                <input type="hidden" name="customer" value="{{$planner['customer_id']}}">
                                <input type="hidden" name="planner_id" value="{{$planner['planner_id']}}">
                                <label>Nombre <span>*</span> </label>
                                <input type="text" placeholder="Escriba el nombre" name="name" onClick="this.select()"
                                       value="{{$planner['name']}}">
                                <label>Descripción <span>*</span> </label>
                                <textarea cols="40" rows="3" placeholder="Escriba la descripción"
                                          name="description">{{$planner['description']}}</textarea>
                                <div class="fw-separator"></div>
                                <label>Archivo <span>*</span> </label>
                                <div class="add-list-media-wrap fuzone">
                                    <div class="fu-text">
                                        <span><i class="fal fa-image"></i> Click aquí o arrastre el archivo</span>
                                        <span class="photoUpload-files fl-wrap"></span>
                                    </div>
                                    <input type="file" class="form-control" name="image" >
                                </div>
                                <button type="submit" class="btn float-btn color2-bg">Guardar <i
                                        class="fas fa-caret-right"></i></button>
                                <div class="clearfix"></div>
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
