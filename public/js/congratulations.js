$(document).ready(function () {
    let params;

    $('.item-congratulations > img').click(function () {
        if(window.innerHeight > window.innerWidth) {
            params = window.innerWidth *82/100
        } else {
            params = window.innerHeight *82/100;
        }
        $('.layout-img').removeClass('hide');
        $('.layout-img > div > a > img').attr('src', $(this).attr('src'));
        $('.layout-img > div > a').attr('href', $(this).attr('src'));
        $('.layout-img > div > a').css({'z-index':'111111'});
        $('.layout-img > .img-source-layout').css({'margin-top': $(window).scrollTop() + 120});
        if(window.innerHeight > window.innerWidth) {
            console.log(params)
            $('.layout-img > .img-source-layout > a > img').css({"width": params * 82 / 100});
        } else {
            $('.layout-img > .img-source-layout > a > img').css({"height": params * 82 / 100});
        }
        console.log('window-height',window.innerHeight);
    });

    $(document).mousedown(function (e) {
        let divImg = $('.layout-img > .img-source-layout > a');
        if (!$(e.target).closest(divImg).length) {
            $('.layout-img').addClass('hide');
        }
    });
});