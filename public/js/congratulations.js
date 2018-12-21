$(document).ready(function(){
    $('.item-congratulations > img').click(function(){
        console.log(window.innerHeight);
        $('.layout-img').removeClass('hide');
        $('.layout-img > div > img').attr('src',$(this).attr('src'));
        $('.layout-img > .img-source-layout').css({'margin-top': $(window).scrollTop() + 120});
        $('.layout-img > .img-source-layout > img').css({'height': window.innerHeight*82/100});
    });
    $(document).mousedown(function(e){
        let divImg = $('.layout-img > .img-source-layout > img');
        if (!$(e.target).closest(divImg).length) {
            $('.layout-img').addClass('hide');
        };
    });
});