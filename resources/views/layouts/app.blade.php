<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    @include('_includes.nav.main')
    @include('_includes.partials.alert')  
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('password_indicator/js/jaktutorial.js') }}"></script>
    <script src="{{ asset('password_indicator/js/jquery.js') }}"></script>
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>  
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    
    <script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#password").keyup(function() {
          passwordStrength(jQuery(this).val());
        });
    });



    /*$(function() {
     $( "#deadline" ).datepicker({ dateFormat: 'yy-mm-dd'}); 
    });*/

    </script>

    <script src="{{asset('js/dt/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dt/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dt/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/dt/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/dt/buttons.flash.min.js')}}"></script>
    <script src="{{asset('js/dt/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/dt/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/dt/pdfmake.min.js')}}"></script>
    

    <!-- Custom Theme Scripts -->
    <script src="{{asset('js/dt_init2.js')}}"></script>


    <footer>
        
        <div class="footer-top"> 
           <div class="container">
             <div class="col-lg-4 col-xs-12 text-center">
                 <a href="#"><i class="fa fa-facebook fa-2x"></i>Facebook</a>
             </div>
              <div class="col-lg-4 col-xs-12 text-center">
                 <a href="#"><i class="fa fa-twitter fa-2x"></i>Twitter</a>
             </div>
              <div class="col-lg-4 col-xs-12 text-center">
                 <a href="#"><i class="fa fa-instagram fa-2x"></i>Instagram</a>
             </div>
           </div> 
        </div>  
        
        <div class="container" style="border-top:1px solid grey;">
            <div class="row text-center">   
                <div class="col-lg-6 col-lg-offset-3">
                      <ul class="menu">
                                 
                             <li>
                                <a href="#">Home</a>
                              </li>
                                   
                              <li>
                                 <a href="#">About</a>
                              </li>
                                   
                              <li>
                                <a href="#">Blog</a>
                              </li>                               
                              <li>
                                <a href="#">Contact</a>
                             </li>
                   
                        </ul>
                </div>
            </div>
        </div>
        
    </footer>
    
    
    <div class="copyright">
     <div class="container">
       
         <div class="row text-center">
            <p>Copyright © 2017 All rights reserved</p>
         </div>
         
       </div>
    </div>
    
</body>
</html>
