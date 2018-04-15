$(document).ready(function(){
    $(".viewMoreLuansim").click(function() {
    	var sosim = $(this).attr('data-sim');
        var frm = document.form_boi_sim_hidden;
        frm.sosim.value	= sosim;
     	document.form_boi_sim_hidden.submit();
     	return false;
    });
    $(".btnSimHopLuanSim").click(function() {
        /*var link = $(this).attr('href');
        alert(link);
        var frm = document.search_tra_cuu_sim_hop_tuoi;
        document.search_tra_cuu_sim_hop_tuoi.submit();*/
        $('.btnXemsimphongthuyHoptuoi').click();
        return false;
    });
    var btn_ac_click_value = true;
    $('.btn_ac_click').click(function(){
        if(btn_ac_click_value){
            $('.show_acount').stop().slideDown("slow");
            btn_ac_click_value = false;
        }else{
            $('.show_acount'). stop().slideUp("slow");
            btn_ac_click_value = true;
        }
    });
    /*var h = $("body").css("width");
    h = parseInt(h);
    alert(h);*/

});

function back_page(){
    history.back();
}

function scroll_to(box){
    var x = $(box).offset();
    var height_x = x.top;
    $("html, body").animate({
        scrollTop: height_x
    }, 800);
}

function get_editor(param){
    CKEDITOR.replace(param);
}


