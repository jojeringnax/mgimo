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
   });
});