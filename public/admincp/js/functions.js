$(document).ready(function(){

    /** Dem chieu dai 1 chuoi **/
    /*
        <label class="" id="for-label">0</label>
        <input type="text" name="" class="countText" data-for="for-label">
    */
    $('.countText').keyup(function(){
        var str = $(this).val();
        var dataFor = $(this).attr('data-for');
        $('#'+dataFor).text( str.length );
    });

    $('.show-box').click(function(){
        $(this).parent().children('.box-hidden').slideDown();
    });

    /** Check max len **/
    $('.check-max-lenght').keyup(function(){
        var dataMax = $(this).attr('data-max');
        var len     = $(this).val().length;
        var labelObj    = $(this).parent().find('.for-check-max-lenght');
        if (len > dataMax) {
            labelObj.addClass('color-red');
        }
        else{
            labelObj.removeClass('color-red');
        }
        labelObj.text(len);
    });
    
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




