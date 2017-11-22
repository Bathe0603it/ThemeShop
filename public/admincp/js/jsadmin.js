$(document).ready(function(){
    $(window).scroll(function(){
        t = parseInt($(window).scrollTop());
        t>50?$('.content-header').addClass('fixTop'):$('.content-header').removeClass('fixTop');
    });
    function heightContentHead(){
        var x = $('.content-header').css('height');
        var paddingX = parseInt(x)+10;
        $('.content').css({'padding-top':paddingX});
    }
    heightContentHead();
    $(".scrollToTop").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false
    });

    $(".scrollTobottom").click(function() {
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 800);
        return false
    });  

    var menushow = true;
    $('.btnMenuMobile').click(function(){
        if(menushow){
            $('#wrap').animate({right:'280px'},'slow');
            $('#wrap').addClass('open');
            $('.bgMenu').addClass('bgMenuShow');
            menushow = false;
        }
        else{
            $('#wrap').animate({right:'0px'},'slow');
            $('#wrap').removeClass('open');
            $('.bgMenu').removeClass('bgMenuShow');
            menushow = true;
        }
        return false;
    });

    $('.bgMenu').click(function(){
        if(menushow){
            $('#wrap').animate({right:'280px'},'slow');
            $('#wrap').addClass('open');
            $('.bgMenu').addClass('bgMenuShow');
            menushow = false;
        }
        else{
            $('#wrap').animate({right:'0px'},'slow');
            $('#wrap').removeClass('open');
            $('.bgMenu').removeClass('bgMenuShow');
            menushow = true;
        }
        return false;
    });
});