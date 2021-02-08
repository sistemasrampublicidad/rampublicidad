

// modal view logo ------------------

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
 
    var modal_view_logo = {};
    modal_view_logo.hide = function () {
        $('.modal_view_logo , .reg-overlay').fadeOut(200);
        $("html, body").removeClass("hid-body");
        $(".modal_view_logo_main").removeClass("vis_mr");
    };
    $('.aaaa-open').on("click", function (e) {

        e.preventDefault();
        var variable = $(this).attr('data-tittle');
        var dataString = "id=" + variable;

        $.ajax({
            type:'GET',
            url:"/show_imagen_modal",
            data:dataString,
            success:function(data){
                $('.img_logo').empty()
                $('.img_logo').append('<img src="http://127.0.0.1:8000/storage/administrator/uploads/logos/'+data+'" class="respimg" alt="">')
            }
         });
    
        $('.modal_view_logo , .reg-overlay').fadeIn(200);
        $(".modal_view_logo_main").addClass("vis_mr");
        $("html, body").addClass("hid-body");
    });
    $('.close-reg , .reg-overlay').on("click", function () {
        modal_view_logo.hide();
    });




    
    $(".show_gcc").on("click", function (e) {
        e.preventDefault();
        $(this).parents(".geodir-category-footer").find(".geodir-category_contacts").addClass("visgdcc");
    });
    $(".close_gcc").on("click", function () {
        $(this).parent(".geodir-category_contacts").removeClass("visgdcc");
    });
    

    var modal_view_planner = {};
    modal_view_planner.hide = function () {
        $('.modal_view_planner , .reg-overlay').fadeOut(200);
        $("html, body").removeClass("hid-body");
        $(".modal_view_planner_main").removeClass("vis_mr");
    };
    $('.aaaa-open-planner').on("click", function (e) {

        e.preventDefault();
        var variable = $(this).attr('data-tittle');
        var dataString = "id=" + variable;
        $.ajax({
            type:'GET',
            url:"/show_planner_modal",
            data:dataString,
            success:function(data){
                console.warn(data)
                $('.img_logo').empty()
                $('.img_logo').append('<iframe width="400" height="400" src="http://127.0.0.1:8000/storage/administrator/uploads/planners/'+data+'" frameborder="0"></iframe>')
            }
         });
    
        $('.modal_view_planner , .reg-overlay').fadeIn(200);
        $(".modal_view_planner_main").addClass("vis_mr");
        $("html, body").addClass("hid-body");
    });
    $('.close-reg , .reg-overlay').on("click", function () {
        modal_view_planner.hide();
    });

