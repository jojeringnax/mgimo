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

    // Display the result in the element with id="demo"
    document.getElementById("timer").innerHTML = "" +
        "<div class='hours d-flex flex-column justify-content-center item-timer'>" +
            "<span class='num'>" + days + "</span>" +
            "<span class='point'>Дней</span>" +
        "</div>" + ":" +
        "<div class='hours d-flex flex-column justify-content-center item-timer'>" +
            "<span class='num'>" + hours + "</span>" +
            "<span class='point'>Часов</span>" +
        "</div>" + ":"
        + "<div class='hours d-flex flex-column justify-content-center item-timer'>" +
            "<span class='num'>" + minutes + "</span>" +
            "<span class='point'>Минут</span>" +
        "</div>" + ":" + "<div class='hours d-flex flex-column justify-content-center item-timer'>" +
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
    let owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
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
});