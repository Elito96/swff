<!DOCTYPE html>
  <html> 
    <head>
        <meta charset="utf-8" />
        <title>Staking pool service</title>

        <!-- mobile settings -->
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

        <!-- WEB FONTS : use %7C instead of | (pipe) -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

        <!-- CORE CSS -->
        <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- THEME CSS -->
        <link href="css/essentials.css" rel="stylesheet" type="text/css" />
        <link href="css/layout.css" rel="stylesheet" type="text/css" />
        <!-- PAGE LEVEL SCRIPTS -->
        <link href="css/header-1.css" rel="stylesheet" type="text/css" />
        <link href="css/color_scheme/darkblue.css" rel="stylesheet" type="text/css" id="color_scheme" />
    </head>

    <body class="smoothscroll enable-animation" style="background-image: url('images/home/fondo.png'); background-repeat: no-repeat; background-size: cover;">
        <div id="header" class="sticky dark header-md noborder clearfix">

                <header id="topNav">
                    <div class="container"><!-- add .full-container for fullwidth -->

                        <!-- Mobile Menu Button -->
                        <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Logo -->
                        <a class="logo pull-left" href="index.html">
                            <img src="assets/images/logo_light.png" alt="" />
                        </a>

                        <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
                            <nav class="nav-main">
                                <ul id="topMain" class="nav nav-pills nav-main">
                                    <li ><!-- HOME -->
                                        <a class="active" href="/">
                                            HOME
                                        </a>
                                    </li>
                                    <li ><!-- HOME -->
                                        <a  href="pools">
                                            POOLS
                                        </a>
                                    </li>
                                    @if (Auth::check())
                                        <li ><!-- HOME -->
                                            <a  href="dashboard">
                                                DASHBOARD
                                            </a>
                                        </li>
                                    @else
                                        <li ><!-- HOME -->
                                            <a  href="login">
                                                LOGIN
                                            </a>
                                        </li>
                                        <li ><!-- HOME -->
                                            <a  href="register">
                                                REGISTRARSE
                                            </a>
                                        </li>
                                    @endif
                                    
                                </ul>

                            </nav>
                        </div>

                    </div>
                </header>
        </div>
        <section>
            <div class="container">
                <div class="row">
                    @foreach ($resultado as $r)
                    <div class="col-md-3">
                        <div class="row box-gradient box-teal">
                            <div>
                                {{$r['nombre']}} - {{$r['acro']}}
                                <br>
                                <img  class="img-responsive" src="{{$r['image']}}">
                                <br>
                                Tiempo de maduración:  <span class="label label-primary">{{$r['maduracion']}}</span> 
                                <br>
                                Retorno anual:  <span class="label label-primary">{{$r['retorno']}}</span> 
                                <br>
                                <br>
                                <br>
                                Estado: <span class="label label-success">{{$r['estado']}}</span> 
                                <br>
                                

                            </div>
                        </div>   
                    </div>
                    @endforeach

                </div>
            </div>    
        </section>
        <br>
        <br>
     <footer id="footer">
                <div class="copyright">
                    <div class="container">
                        <ul class="pull-right nomargin list-inline mobile-block">
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li>&bull;</li>
                            <li><a href="pools">Pools</a></li>
                        </ul>
                        &copy; Todos los derechos reservados. 
                    </div>
                </div>
            </footer>   
    </body>

    <script type="text/javascript">var plugin_path = 'plugins/';</script>
        <script type="text/javascript" src="plugins/jquery/jquery-2.1.4.min.js"></script>

        <!-- SCRIPTS -->
        <script type="text/javascript" src="js/scripts.js"></script>

</html>
