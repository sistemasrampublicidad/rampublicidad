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
                        <h3>Editar Post </h3>
                    </div>
                    <form method="POST" action="{{ route('update.post') }}" accept-charset="UTF-8"
                                enctype="multipart/form-data" >
                              @csrf
                              <input type="hidden" name="employee" value="{{auth()->id()}}">
                              <input type="hidden" name="customer" value="{{$customer['id']}}">
                              <input type="hidden" name="post_id" value="{{$planner['id']}}">
                              <input type="hidden" name="type" value="3">
                              <div class="profile-edit-container fl-wrap block_box ">
                                  <div class="custom-form">
                                      <div class="row">
                                          {{-- <div class="col-md-12">
                                              <label>Nombre <span>*</span> </label>
                                              <input type="text" placeholder="Escriba el nombre" name="name" onClick="this.select()"
                                                     value="">
                                          </div> --}}
                                          <div class="col-md-6">
                                              <label>Motivo del post <span>*</span> </label>
                                              <input type="text" placeholder="Escriba el nombre" name="post_reason" onClick="this.select()"
                                                     value="{{$planner['post_reason']}}">
                                          </div>
                                          <div class="col-md-6">
                                              <label>Plataforma <span>*</span> </label>
                                              <input type="text" placeholder="Escriba el nombre" name="platform" onClick="this.select()"
                                                     value="{{$planner['platform']}}">
                                          </div>

                                          <div class="col-md-12">
                                            <div class="main-search-input-item clact date-container">
                                                <span class="iconn-dec"><i class="fal fa-calendar"></i></span>
                                                <input type="text" placeholder="Date and Time"     name="datepicker-here-time"   value="{{$planner['created_at']}}"/>
                                                <span class="clear-singleinput"><i class="fal fa-times"></i></span>
                                            </div>
                                          </div>

                                          <span class="section-separator"></span>

                                          <div class="col-md-12">
                                              <label>Caption <span>*</span> </label>
                                              <textarea class="ckeditor form-control" name="caption">{{$planner['caption']}}</textarea>
                                          </div>
                                          <div class="col-md-6">
                                              <label>Archivo <span>*</span> </label>
                                              <div class="add-list-media-wrap fuzone">
                                                  <div class="fu-text">
                                                      <span><i class="fal fa-image"></i> Click aquí o arrastre la imagen</span>
                                                      <span class="photoUpload-files fl-wrap"></span>
                                                  </div>
                                                  <input type="file" class="form-control" name="image" >
                                              </div>
                                          </div>
      
                                       
                                      </div>
                                      <button type="submit" class="btn float-btn color2-bg">Editar <i
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
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@include('layouts.footer')
