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
        <section class="heading-title heading-arrow-bottom">
            <div class="container">

                <div class="text-center">
                    <h3>Realizar un retiro</h3>
                </div>

            </div>
        </section>
        <section>
            <div class="container">
              <div class="panel panel-default" style="border-style: solid;">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#tab_g" data-toggle="tab">Potcoin</a></li>
                    <li><a href="#tab_h" data-toggle="tab">Blackcoin</a></li>
                    <li><a href="#tab_i" data-toggle="tab">BitBean Cash</a></li>
                    <li><a href="#tab_j" data-toggle="tab">Reddcoin</a></li>
                </ul>
                    <div class="tab-content tab-stacked nav-alternate">
                        <div id="tab_g" class="tab-pane active">
                            <center>
                               <img src="images/0.png" width="">
                                 <p>Paso 1. Ingresa la cantidad que deseas retirar - Min 0.03 POT</p>
                                 <p>Paso 2. Se cobrara un fee de 0.02 POT</p>
                                 <p>Paso 3. Click en "Retirar"</p>
                                 <p>Paso 4. Se generará un retiro en tu lista de retiros, una vez confirmado, tus criptomonedas se veran reflejadas en tu wallet</p>
                                  <p> BALANCE:<b> {{$balance[0]->cantidad}} POT </b></p>
                            </center>
                            <div class="panel panel-default">
                            <div class="panel-heading">Retiro</div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="retirar">
                                    {{ csrf_field() }}
                                    <br>
                                        <div class="form-group">
                                            <label for="direccion" class="col-md-4 control-label">Direccion POTCOIN</label>

                                            <div class="col-md-6">
                                                <input id="direccion" class="form-control" name="direccion"  required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                                            <div class="col-md-6">
                                                <input id="cantidad" maxlength="10" class="form-control" min="0.03000000" max="{{$balance[0]->cantidad}}" name="cantidad" type="number" value="0.03000000" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Retirar
                                                </button>
                                            </div>
                                        </div>
                                        <input type="" name="moneda" hidden="true" value="1">  
                                </form>
                            </div>
                           </div>
                        </div>

                        <div id="tab_h" class="tab-pane">
                            <center>
                               <img src="images/1.png" width="">
                                 <p>Paso 1. Ingresa la cantidad que deseas retirar - Min 0.10 BLK</p>
                                 <p>Paso 2. Se cobrara un fee de 0.03 BLK</p>
                                 <p>Paso 3. Click en "Retirar"</p>
                                 <p>Paso 4. Se generará un retiro en tu lista de retiros, una vez confirmado, tus criptomonedas se veran reflejadas en tu wallet</p>

                                 <p> BALANCE:<b> {{$balance[1]->cantidad}} BLK </b></p>
                            </center>
                            <div class="panel panel-default">
                            <div class="panel-heading">Retiro</div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="retirar">
                                    {{ csrf_field() }}
                                    <br>
                                        <div class="form-group">
                                            <label for="direccion" class="col-md-4 control-label">Direccion BLACKCOIN</label>

                                            <div class="col-md-6">
                                                <input id="direccion" class="form-control" name="direccion"  required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                                            <div class="col-md-6">
                                                <input id="cantidad" maxlength="10" class="form-control" min="0.10000000" max="{{$balance[1]->cantidad}}" name="cantidad" type="number" value="0.10000000" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Retirar
                                                </button>
                                            </div>
                                        </div>
                                        <input type="" name="moneda" hidden="true" value="2">  
                                </form>
                            </div>
                           </div>
                        </div>

                        <div id="tab_i" class="tab-pane">
                            <center>
                               <img src="images/2.png" width="">
                                 <p>Paso 1. Ingresa la cantidad que deseas retirar - Min 1000 BITB</p>
                                 <p>Paso 2. Se cobrara un fee de 50 BITB</p>
                                 <p>Paso 3. Click en "Retirar"</p>
                                 <p>Paso 4. Se generará un retiro en tu lista de retiros, una vez confirmado, tus criptomonedas se veran reflejadas en tu wallet</p>
                                 <p> BALANCE:<b> {{$balance[2]->cantidad}} BITB </b></p>
                            </center>
                            <div class="panel panel-default">
                            <div class="panel-heading">Retiro</div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="retirar">
                                    {{ csrf_field() }}
                                    <br>
                                        <div class="form-group">
                                            <label for="direccion" class="col-md-4 control-label">Direccion BitBean</label>

                                            <div class="col-md-6">
                                                <input id="direccion" class="form-control" name="direccion"  required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                                            <div class="col-md-6">
                                                <input id="cantidad" maxlength="10" class="form-control" min="1000" max="{{$balance[2]->cantidad}}" name="cantidad" type="number" value="1000" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Retirar
                                                </button>
                                            </div>
                                        </div>
                                        <input type="" name="moneda" hidden="true" value="3">  
                                </form>
                            </div>
                           </div> 
                        </div>
                        <div id="tab_j" class="tab-pane">
                            <center>
                               <img src="images/3.png" width="">
                                 <p>Paso 1. Ingresa la cantidad que deseas retirar - Min 10000 RDD</p>
                                 <p>Paso 2. Se cobrara un fee de 350 RDD</p>
                                 <p>Paso 3. Click en "Retirar"</p>
                                 <p>Paso 4. Se generará un retiro en tu lista de retiros, una vez confirmado, tus criptomonedas se veran reflejadas en tu wallet</p>
                                 <p> BALANCE:<b> {{$balance[3]->cantidad}} RDD </b></p>
                            </center>
                            <div class="panel panel-default">
                            <div class="panel-heading">Retiro</div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="retirar">
                                    {{ csrf_field() }}
                                    <br>
                                        <div class="form-group">
                                            <label for="direccion" class="col-md-4 control-label">Direccion REDDCOIN</label>

                                            <div class="col-md-6">
                                                <input id="direccion" class="form-control" name="direccion"  required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad" class="col-md-4 control-label">Cantidad</label>

                                            <div class="col-md-6">
                                                <input id="cantidad" maxlength="10" class="form-control" min="10000" max="{{$balance[3]->cantidad}}" name="cantidad" type="number" value="10000" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Retirar
                                                </button>
                                            </div>
                                        </div>
                                        <input type="" name="moneda" hidden="true" value="4">  
                                </form>
                            </div>
                           </div>
                        </div>
                    </div>  
              </div>    
        </section>
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
