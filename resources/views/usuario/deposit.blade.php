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
                    <h3>Realizar depositos</h3>
                </div>

            </div>
        </section>
        <section>
            <div class="container">
              <div class="panel panel-default" style="border-style: solid;">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#tab_g" data-toggle="tab">Criptomonedas</a></li>
                    <li><a href="#tab_h" data-toggle="tab">Cuenta bancaria</a></li>
                    <li><a href="#tab_i" data-toggle="tab">Tigo Money</a></li>
                </ul>
                    <div class="tab-content tab-stacked nav-alternate">
                        <div id="tab_g" class="tab-pane active">
                            <center>
                               <img src="images/logo/btc.png" width="">
                                 <p>Paso 1. Ingresa la cantidad de BTC que va a depositar</p>
                                 <p>Paso 2. Seleccione la criptomoneda a la cual se va a convertir el deposito</p>
                                 <p>Paso 3. Click en "Realizar Deposito"</p>
                                 <p>Paso 4. Se generará un deposito en tu lista de depositos, 1 hora para que se realize el deposito, una vez confirmado, se te acreditara el saldo a tu cuenta</p>
                            </center>
                            <div class="panel panel-default">
                            <div class="panel-heading">Deposito</div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="depositbtc">
                                    {{ csrf_field() }}
                                    <center><img src="images/logo/qr.png"><br>
                                    Puedes enviar los BTC usando un lector QR</center>
                                    <br>
                                        <div class="form-group">
                                            <label for="telfadmin" class="col-md-4 control-label">Dirección de BTC a depositar</label>

                                            <div class="col-md-6">
                                                <input id="telfadmin"  class="form-control" name="telfadmin" disabled="true" value="1BMmNEBXGxZ95TxBt8UC4Xd2P9vcZA7SHZ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad" class="col-md-4 control-label">Cantidad a depositar en BTC</label>

                                            <div class="col-md-6">
                                                <input id="cantidad" maxlength="10" class="form-control" min="0.00020000" name="cantidad" type="number" value="0.00020000" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Seleccione la criptomoneda</label>
                                            <div class="col-md-6">
                                                <div class="fancy-form fancy-form-select">
                                                    <select class="form-control" name="moneda">
                                                        <option value="1">Potcoin</option>
                                                        <option value="2">Blackcoin</option>
                                                        <option value="3">BitBean Cash</option>
                                                        <option value="4">ReddCoin</option>
                                                    </select>
                                                    <i class="fancy-arrow"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Realizar Deposito
                                                </button>
                                            </div>
                                        </div>  
                                </form>
                            </div>
                           </div>
                        </div>

                        <div id="tab_h" class="tab-pane">
                            <center>
                               <img src="images/logo/bank.png" width="">
                                 <p>Paso 1. Ingresa la cantidad de Bs. que va a depositar</p>
                                 <p>Paso 2. Seleccione la criptomoneda a la cual se va a convertir el deposito</p>
                                 <p>Paso 3. Click en "Realizar Deposito"</p>
                                 <p>Paso 4. Se generará un deposito en tu lista de depositos, 5 dias habiles para que se realize el deposito, una vez confirmado, se te acreditara el saldo a tu cuenta</p>
                            </center>
                            <div class="panel panel-default">
                            <div class="panel-heading">Deposito</div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="depositcuenta">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="telfadmin" class="col-md-4 control-label">Numero de cuenta a depositar</label>

                                            <div class="col-md-6">
                                                <input id="telfadmin"  class="form-control" name="telfadmin" disabled="true" value="1149 7512 73 6258114472">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad" class="col-md-4 control-label">Cantidad a depositar en Bs</label>

                                            <div class="col-md-6">
                                                <input id="cantidad" min="5" class="form-control" name="cantidad" type="number" value="5" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Seleccione la criptomoneda</label>
                                            <div class="col-md-6">
                                                <div class="fancy-form fancy-form-select">
                                                    <select class="form-control" name="moneda">
                                                        <option value="1">Potcoin</option>
                                                        <option value="2">Blackcoin</option>
                                                        <option value="3">BitBean Cash</option>
                                                        <option value="4">ReddCoin</option>
                                                    </select>
                                                    <i class="fancy-arrow"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Realizar Deposito
                                                </button>
                                            </div>
                                        </div>  
                                </form>
                            </div>
                           </div> 
                        </div>

                        <div id="tab_i" class="tab-pane">
                            <center>
                                <img src="images/logo/tigo.png" width="">
                                 <p>Paso 1. Ingresa tu numero de telefono del cual se va a realizar el deposito</p>
                                 <p>Paso 2. Ingresa la cantidad de Bs. que va a depositar</p>
                                 <p>Paso 3. Seleccione la criptomoneda a la cual se va a convertir el deposito</p>
                                 <p>Paso 4. Click en "Realizar Deposito"</p>
                                 <p>Paso 5. Se generará un deposito en tu lista de depositos, 2 dias para que se realize el deposito, una vez confirmado, se te acreditara el saldo a tu cuenta</p>
                            </center>
                           <div class="panel panel-default">
                            <div class="panel-heading">Deposito</div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="deposittigomoney">
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="telfadmin" class="col-md-4 control-label">Numero de telefono a depositar</label>

                                            <div class="col-md-6">
                                                <input id="telfadmin"  class="form-control" name="telfadmin" disabled="true" value="+591 75516778">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono" class="col-md-4 control-label">Numero de telefono</label>

                                            <div class="col-md-6">
                                                <input id="telefono"  class="form-control" name="telefono"  required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad" class="col-md-4 control-label">Cantidad a depositar en Bs</label>

                                            <div class="col-md-6">
                                                <input id="cantidad" min="5" class="form-control" name="cantidad" type="number" value="5" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Seleccione la criptomoneda</label>
                                            <div class="col-md-6">
                                                <div class="fancy-form fancy-form-select">
                                                    <select class="form-control" name="moneda">
                                                        <option value="1">Potcoin</option>
                                                        <option value="2">Blackcoin</option>
                                                        <option value="3">BitBean Cash</option>
                                                        <option value="4">ReddCoin</option>
                                                    </select>
                                                    <i class="fancy-arrow"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Realizar Deposito
                                                </button>
                                            </div>
                                        </div>  
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
