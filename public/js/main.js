// Set the date we're counting down to
let countDownDate = new Date("Jan 1, 2019 00:00:00").getTime();

// Update the count down every 1 second
let x = setInterval(function() {
    // Get todays date and time
    let now = new Date().getTime();

    // Find the distance between now and the count down date
    let distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id=""
    document.getElementById("timer").innerHTML = "" +
        "<div class='hours d-flex flex-column justify-content-center item-timer'>" +
            "<span class='num'>" + days + "</span>" +
            "<span class='point'>Дней</span>" +
        "</div>" + "<div class='sm-colon'><span class='colon'>:</span></div>" +
        "<div class='hours d-flex flex-column justify-content-center item-timer'>" +
            "<span class='num'>" + hours + "</span>" +
            "<span class='point'>Часов</span>" +
        "</div>" + "<div class='sm-colon'><span class='colon'>:</span></div>"
        + "<div class='hours d-flex flex-column justify-content-center item-timer'>" +
            "<span class='num'>" + minutes + "</span>" +
            "<span class='point'>Минут</span>" +
        "</div>" + "<div class='sm-colon'><span class='colon'>:</span></div>" + "<div class='hours d-flex flex-column justify-content-center item-timer'>" +
            "<span class='num'>" + seconds + "</span>" +
            "<span class='point'>Секунд</span>" +
        "</div>";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML = "EXPIRED";
    }
}, 1000);

$(document).ready(function(){

    $('.big-news').mouseover(function(){
        $('.layout-big-new').css({'background':'black','cursor':'pointer'});
        $('.layout-big-new').animate({'opacity':'0.7'});
        $(this).click(function(){
            //console.log($(this).children('article').children('a'))
            document.location.href = $(this).children('article').children('a').attr('href');
        });
    });
    $('.big-news').mouseout(function(){
        $('.layout-big-new').css({'background':'linear-gradient(to bottom, transparent, black)'});
        $('.layout-big-new').animate({'opacity':'0.7'});
    });

    let owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:50,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    $(".next").click(function(){
        console.log('next');
        owl.trigger('next.owl');
    });
    $(".prev").click(function(){
        owl.trigger('prev.owl');
    });

    $('.arrow')
    $('body').css({"background-color":"white"});

    let colorTags = {
        'СПОРТ': '#05C386',
        'ИСКУССТВО': '#EB205E',
        'НАУКА': '#0054B9',
        'ОБРАЗОВАНИЕ':'#FFBA00',
        'МЕЖДУНАРОДНЫЕ СВЯЗИ':'#A5A5A5',
        'ВСТРЕЧИ ВЫПУСКНИКОВ':'#B2E821',
        'КОНЦЕРТЫ':'#1DB5ED',
        'ЮБИЛЕИ':'#FF6C00',
        'ПРЕЗЕНТАЦИИ':'#9946B2',
        'ИЗДАНИЯ':'#1A2F3F'
    };

    $('.tag').each(function(){
        $(this).children('i').css({'background-color': colorTags[$(this).children('span').text()]}) ;
    });

    $('.item-congratulations > img').click(function(){
        $('.layout-img').removeClass('hide');
        $('.layout-img > div > img').attr('src',$(this).attr('src'));
        $('.layout-img > .img-source-layout').css({'margin-top': $(window).scrollTop() + 120});
        $('.layout-img > .img-source-layout > img').css({'height': window.innerHeight*82/100});
    });
    $(document).mousedown(function(e){
        let divImg = $('.layout-img > .img-source-layout > img');
        if (!$(e.target).closest(divImg).length) {
            $('.layout-img').addClass('hide');
        }
    });
    $(window).scroll(function(){
        if($(window).scrollTop() >= 80) {
            //console.log($('nav'))
            $('.nav-top').css({'background-color': 'white'});
            $('.nav-top').addClass('box-sd');
        }else if($(window).scrollTop() <=150){
            $('.nav-top').css({'background-color': 'transparent'});
            $('.nav-top').removeClass('box-sd');
        }
         if ($(window).scrollTop() > $(window).outerHeight()*3) {
             $('.arrow-top').css({'display': 'block'});
         } else if($(window).scrollTop() < $(window).outerHeight()) {
             $('.arrow-top').css({'display': 'none'});
         }

    });
    $('.arrow-top').click(function(){
        console.log('kuku')
        $('html,body').stop().animate({scrollTop:0},1000);
    });
    $('.banner-header').css({'height':$(window).outerHeight()});

});