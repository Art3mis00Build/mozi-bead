$('.readmore').click(function() {
    if($(this).attr('rel') != 'close') {
        $(this).text('Bezár').attr('rel', 'close').prev('.readmore-content').removeClass('hidden').prev('.readmore-dots').addClass('hidden');
    } else {
        $(this).text('Tovább').attr('rel', '').prev('.readmore-content').addClass('hidden').prev('.readmore-dots').removeClass('hidden');
    }
    return false;
});
$(document).ready(function(){
    $('.next').on('click',function(){
        var currentImg=$('.active');
        var nextImg=currentImg.next();
        if(nextImg.length){
            currentImg.removeClass('active').css('z-index', -10);
            nextImg.addClass('active').css('z-index, -10');
        }
    });
    $('.prev').on('click',function(){
        var currentImg=$('.active');
        var prevImg=currentImg.prev();
        if(prevImg.length){
            currentImg.removeClass('active').css('z-index', -10);
            prevImg.addClass('active').css('z-index, -10');
        }
    });
});

/*$('.main_content-genre a').click(function(){
    if($(this).attr('rel')!= 'sign'){
        $(this).attr('rel', 'sign').addClass('sign');
    }if($(this).attr('rel')=='sign'){  
        $(this).attr('rel').removeClass('sign');
        }
        return false;
});*/