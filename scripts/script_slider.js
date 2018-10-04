$(document).ready(function(){
    var slider_width = 100 * $('.profil').length + "%";
    $('.slider').width(slider_width);
    var marge = 0;
    $('#left').on("click", function(){
        if (marge === 0) {
            marge = -500 * ($('.profil').length - 1);
        } else {
            marge+=500;
        }
        $(".slider").animate({"margin-left": marge}, 800);
        $(".slider").css({marginLeft:marge});
    });
    $('#right').on("click", function(){
        if (marge == -500 * ($('.profil').length - 1)) {
            marge = 0;
        } else {
            marge-=500;
        }
        $(".slider").animate({"margin-left": marge}, 800);
        $(".slider").css({marginLeft:marge});
    });
});