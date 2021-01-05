console.warn('gaa');

// modal view logo ------------------
var modal_view_logo = {};
modal_view_logo.hide = function () {
    $('.modal_view_logo , .reg-overlay').fadeOut(200);
    $("html, body").removeClass("hid-body");
    $(".modal_view_logo_main").removeClass("vis_mr");
};
$('.aaaa-open').on("click", function (e) {
    e.preventDefault();
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