$(document).ready(function () {
   // let dict_loc = ['','anniversary', 'news', 'events', 'smis', 'congratulations', 'books', 'gallery', 'partners', 'contacts'];
   // let loc = window.location.href.substr(24);
   // for(let i = 0; i < dict_loc.length; i++) {
   //    if ( loc == dict_loc[i]) {
   //       $('#link-'+ dict_loc[i]).addClass('active-link');
   //    } else if(loc.substr(0, 4) == 'news' || loc.substr(0, 7) == 'gallery' || loc.substr(0, 6) == 'events' || loc.substr(0, 5) == 'books'){
   //       if(loc.indexOf('/') !== -1) {
   //          $('#link-'+ loc.substr(0, loc.indexOf('/'))).addClass('active-link');
   //       }
   //
   //    }
   // }

   $(window).scroll(function(){
      if($(window).scrollTop() >= $(window).outerHeight()*1.3) {
         $('.arrow-top').removeClass('hide');
      }else {
         $('.arrow-top').addClass('hide');
      }
   });

   $('.arrow-top').click(function(){
      $('html,body').stop().animate({scrollTop:0},1000);
      //$(this).children('span.text-btn').animate({left: '15px'},500);
   });

   $('.btn-linkk').mouseenter(function(e){
      e.preventDefault();
      $(this).children('span.text-btn').stop().animate({left: '-15px'},300);
      $(this).children('span.arrow-btn').css({'display':'block'});
      $(this).children('span.arrow-btn').stop().animate({opacity: 1, right: '17px'}, 300);
   });

   $('.btn-linkk').mouseleave(function(e){
      e.preventDefault();
      $(this).children('span.text-btn').stop().animate({left: '0'},300);
      $(this).children('span.arrow-btn').stop().animate({opacity: 0, right: 0}, 300);
   });

   $('.btn-linkk-photo').mouseenter(function(e){
      e.preventDefault();
      $(this).children('span.text-btn').stop().animate({left: '-15px'},300);
      $(this).children('span.arrow-btn').css({'display':'block'});
      $(this).children('span.arrow-btn').stop().animate({opacity: 1, right: '17px'}, 300);
   });

   $('.btn-linkk-photo').mouseleave(function(e){
      e.preventDefault();
      $(this).children('span.text-btn').stop().animate({left: '0'},300);
      $(this).children('span.arrow-btn').stop().animate({opacity: 0, right: 0}, 300);
   });

   // let k = $('.item-img-news');
   // let oldHight  = k.offset().top;
   // let imgWidth = $('.item-img-news > img').width();
   // let topImg = $(window).height()/2 - imgWidth/2
   // console.log($(window).scrollTop(), oldHight);
   // $(window).scroll(function(){
   //     if(oldHight <= $(window).scrollTop()) {
   //         $('.item-img-news').css({'position': 'fixed', 'margin-right': '30px'});
   //         $('.item-img-news').animate({top: topImg}, 2000);
   //         $('.item-img-news > img').css({'width': imgWidth});
   //     } else {
   //         $('.item-img-news').css({'position': '', 'margin-right': '0'});
   //         $('.item-img-news > img').css({'width': '100%'});
   //     }
   //     console.log($(window).scrollTop(), $('.layout_news').height())
   //    if($('.layout_news').height() <= $(window).scrollTop() + imgWidth) {
   //       $('.item-img-news').css({'position': 'absolute','bottom': '0'});
   //       $('.item-img-news img').css({'position': 'absolute'});
   //       $('.item-img-news').animate({bottom: topImg}, 2000);
   //    } else {
   //       $('.item-img-news > img').css({'position': ''});
   //    }
   // });
});