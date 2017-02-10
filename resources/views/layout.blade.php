<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>relecture</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">


    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/Chart.js') }}"></script>
    

    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#theMenu">
        
    <!-- Menu -->
    <nav class="menu" id="theMenu">
        <div class="menu-wrap">
            <h1 class="logo"><a href="index.html#home">relecture</a></h1>
            <i class="icon-remove menu-close"></i>
            @if (!Auth::user())
                <a href="{{ url('login') }}" class="smoothScroll">Connexion </a>
                <a href="{{ url('register') }}" class="smoothScroll">s'enregistrer </a>
            @else
                <a href="{{ url('logout') }}" class="smoothScroll">Déconnexion </a>
            @endif
            <a href="{{ url('cours') }}" class="smoothScroll">Cours</a>
            

            <a href="#contact" class="smoothScroll">Contact</a>
            <a href="#"><i class="icon-facebook"></i></a>
            <a href="#"><i class="icon-twitter"></i></a>
            <a href="#"><i class="icon-dribbble"></i></a>
            <a href="#"><i class="icon-envelope"></i></a>
        </div>
        
        <!-- Menu button -->
        <div id="menuToggle"><i class="icon-reorder"></i></div>
    </nav>


    
    @yield('content')
    

    
    <!-- ========== CHARTS - DARK GREY SECTION ========== -->
    
    
    
    
    
    <!-- ========== ABOUT - GREY SECTION ========== -->
    <section id="about" name="about"></section>
    
    
    <!-- ========== FOOTER SECTION ========== -->
    <section id="contact" name="contact"></section>
    <div id="f">
        <div class="container">
            <div class="row">
                    <h3><b>CONTACT</b></h3>
                    <br>
                    <div class="col-lg-4">
                        <h3><b>Email</b></h3>
                        <h3>relecteur@evry.fr</h3>
                        <br>
                    </div>
                    
                    <div class="col-lg-4">  
                        <h3><b>Tél:</b></h3>
                        <h3>01.13.14.13.13</h3>
                        <br>
                    </div>
                    
                    <div class="col-lg-4">
                        <h3><b> Social</b></h3>
                        <p>
                            <a href="index.html#"><i class="icon-facebook"></i></a>
                            <a href="index.html#"><i class="icon-twitter"></i></a>
                            <a href="index.html#"><i class="icon-envelope"></i></a>
                        </p>
                        <br>
                    </div>
                </div>
            </div>
        </div><!-- /container -->
    </div><!-- /f -->
    
    <div id="c">
        <div class="container">
            <p>Created by <a href="http://www.blacktie.co">BLACKTIE.CO</a></p>
        
        </div>
    </div>
    
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/js/classie.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
