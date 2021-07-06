//fix phone screen
function phone_screen(){
    var $window = $(window);
    var _ww = $window.width();
    var _hw = $window.height() - 35;

    if( _ww > 992){
        $('.phone-box').addClass('phone-screen');
    }
    else{
        $('.phone-box').removeClass('phone-screen');
    }

    var wphone = $(".phone-screen").outerWidth();
    var hphone = $(".phone-screen").outerHeight();
    var wframe = $(".phone-screen .box").outerWidth();
    var hframe = $(".phone-screen .box").outerHeight();
    if( _hw < 949){
        var hphone1 = _hw - 10;
        var wphone1 = (hphone1 * 514) / 930;
        var wphone1_leftMG = -(wphone1 / 2);

        var hframe1 = (hphone1 * hframe) / hphone;
        var wframe1 = (wphone1 * wframe) / wphone;
        var topMG = (hphone1 - hframe1) / 2;

        var bottom_back = -((topMG + 18) / 2);

        $(".phone-screen").addClass('small-phone');

        $(".phone-screen").css("height", hphone1);
        $(".phone-screen").css("width", wphone1);
        $(".phone-screen").css("top", '5px');
        $(".phone-screen").css("margin-left", wphone1_leftMG);

        $(".phone-screen .box").css("height", hframe1);
        $(".phone-screen .box").css("width", wframe1);
        $(".phone-screen .box").css("margin-top", topMG);

        $(".phone-screen .back-row").css("bottom", bottom_back);

        $(".phone-screen .box .tabs-block-all").css("height", hframe1);
        $(".phone-screen .box .tabs-block-all .tab-content-all >li").css("max-height", hframe1 - 61);

        if(_ww<=992){
            $(".phone-box").removeClass('small-phone');

            $(".phone-box").css("height", '');
            $(".phone-box").css("width", '');
            $(".phone-box").css("top", '');
            $(".phone-box").css("margin-left", '');

            $(".phone-box .box").css("height", '');
            $(".phone-box .box").css("width", '');
            $(".phone-box .box").css("margin-top", '');

            $(".phone-box .back-row").css("bottom", '');

            $(".phone-box .box .tabs-block-all").css("height", '');
            $(".phone-box .box .tabs-block-all .tab-content-all >li").css("max-height", '');
        }
    }
    else{
        $(".phone-screen").removeClass('small-phone');

        $(".phone-screen").css("height", '');
        $(".phone-screen").css("width", '');
        $(".phone-screen").css("top", '');
        $(".phone-screen").css("margin-left", '');

        $(".phone-screen .box").css("height", '');
        $(".phone-screen .box").css("width", '');
        $(".phone-screen .box").css("margin-top", '');

        $(".phone-screen .back-row").css("bottom", '');

        $(".phone-screen .box .tabs-block-all").css("height", '');
        $(".phone-screen .box .tabs-block-all .tab-content-all >li").css("max-height", '');
    }
}

//right sticky
function right_sticky(){
    if ($(this).parent().hasClass("active")){
        $(this).parent().removeClass("active");
    }
    else{
        $(this).parents('ul').children('li').removeClass("active");
        $(this).parent().addClass("active");
    }
}
function right_sticky_close(){
    $(this).parent().parent().removeClass("active");
}

//full screen
function full_screen(){
    if ($(this).parent().hasClass("fullscreen-btn")){
        $(this).parent().removeClass("fullscreen-btn");
        $('body').removeClass("fullscreen");
    }
    else{
        $(this).parent().addClass("fullscreen-btn");
        $('body').addClass("fullscreen");
    }
}

jQuery(document).ready(function () {
    
    phone_screen();
    $('.right-side-sticky ul li a').click(right_sticky);
    $('.right-side-sticky ul li .sticky-box .close-btn').click(right_sticky_close);
    $('.right-side-sticky ul li a.zoom').click(full_screen);

    //Body is resized
    $(window).resize(function () {
        phone_screen();
    });

});