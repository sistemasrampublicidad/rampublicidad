
<?php 
use App\Models\administrator\DetailsLogos;
use App\Models\administrator\Logos;
use App\Models\administrator\DetailsPlanners;
use App\Models\administrator\Planners;
use App\Models\administrator\Brandings;

 function show_logos($user){
 
    if($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3){
        $count_logos = Logos::where('employee_id', '=',  $user->id)
            ->count();
    }else {
        $count_logos =Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('brandings.customer_id', '=',$user->id)
            ->select('logos.*','logos.id as logo_id','details_logo.*','brandings.*')
            ->count();
    }
    echo $count_logos;
}
function know_type_user_logos($user){
    if($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3){
        echo "Logos registrados";
    }else {
        echo "Mis logos";
    }
}


function show_planners($user){
    if($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3){
        $count_planners = Planners::where('employee_id', '=',  $user->id)
            ->count();
    }elseif($user->role_id == 4 ) {
        $count_planners =Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('brandings.customer_id', '=', $user->id)
            ->select('planners.*','planners.id as planner_id','details_planners.*','brandings.*')
            ->count();
    }else{
        $count_planners = "Error";
    }
    echo $count_planners;
}
function know_type_user_planners($user){
    if($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3){
        echo "Planners registrados";
    }else {
        echo "Mis planners";
    }
}
?>

<section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
    <div class="container">
        <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
            <h1>Bienvenido : <span>{{ auth()->user()->name }}</span></h1>
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
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-check"></i>
                                        {{know_type_user_logos(auth()->user())}}
                                        <span>{{show_logos(auth()->user())}}</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-check"></i>
                                        {{know_type_user_planners(auth()->user())}}
                                        <span>{{show_planners(auth()->user())}}</span>
                                    </div>
                                </div>
                                {{-- <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-comments-alt"></i>
                                        Total Reviews
                                        <span>79</span>
                                    </div>
                                </div> --}}
                                {{-- <div class="swiper-slide">
                                    <div class="dashboard-header-stats-item">
                                        <i class="fal fa-heart"></i>
                                        Times Bookmarked
                                        <span>654</span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="dhs-controls">
                        <div class="dhs dhs-prev"><i class="fal fa-angle-left"></i></div>
                        <div class="dhs dhs-next"><i class="fal fa-angle-right"></i></div>
                    </div> --}}
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