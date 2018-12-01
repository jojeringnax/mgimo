<!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>MGIMO75</title>
         <link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="mdb/assets/css/docs.css">
         <link rel="stylesheet" href="js/OwlCarousel2/dist/assets/owl.carousel.css">
     </head>
     <body>
         @yield('nav')
         @yield('banner')
         @yield('news')
         @yield('media')
         @yield('congratulations')
         @yield('gallery')
         @yield('partners')
         <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
         <script src="{{asset('js/popper.min.js')}}"></script>
         <script src="{{asset('js/tooltip.min.js')}}"></script>
         <script src="{{asset('js/bootstrap-material-design.js')}}"></script>
         <script src="{{asset('js/main.js')}}"></script>
         <script src="{{asset('js/OwlCarousel2/dist/owl.carousel.min.js')}}"></script>
     </body>
 </html>
