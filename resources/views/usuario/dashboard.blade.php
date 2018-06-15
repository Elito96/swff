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
    <script type="text/javascript">
        function showMessage(){
            var notificacion = {!! json_encode($notificacion) !!};
            var b = {!! json_encode($b) !!};
           if(b == true) 
            _toastr(""+notificacion.mensaje,"top-right","success",false);
        }
    </script>
    <body class="smoothscroll enable-animation" style="background-image: url('images/home/fondo.png'); background-repeat: no-repeat; background-size: cover;" onload="showMessage();">
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
                    <h3>Dashboard</h3>
                </div>

            </div>
        </section>
        <section>
            <div class="container">
              <div class="panel panel-default" style="border-style: solid;">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#tab_g" data-toggle="tab">Información</a></li>
                    <li><a href="#tab_h" data-toggle="tab">Balances</a></li>
                    <li><a href="#tab_i" data-toggle="tab">Generado</a></li>
                    <li><a href="#tab_j" data-toggle="tab">Transacciones</a></li>
                    <li><a href="#tab_k" data-toggle="tab">Ultimos stakes</a></li>
                </ul>
                    <div class="tab-content tab-stacked nav-alternate">
                        <div id="tab_g" class="tab-pane active">
                            <center>
                                <br>
                                <h2>Resumen de información</h2>
                               <ul class="list-group" style="margin: 20px;" align="center">
                                    <li class="list-group-item">Nombre: {{$infouser->name}} </li>
                                    <li class="list-group-item">Email: {{$infouser->email}}</li>
                                    <li class="list-group-item">Transacciones Generadas: {{$infogenerado}}</li>
                                </ul>
                            </center>
                        </div>

                        <div id="tab_h" class="tab-pane">
                            <center>
                                <br>
                                <h2>Balance</h2>
                               <ul class="list-group" style="margin: 20px;" align="center">
                                @foreach ($balance as $b)
                                    <li class="list-group-item"><img src="{{$b['img']}}"> {{$b['cantidad']}} - BTC estimado: {{$b['estimado']}} BTC</li>
                                @endforeach
                                </ul>
                                <a href="deposit" class="btn btn-info btn-3d">Depositar </a>
                                <a href="withdraw" class="btn btn-info btn-3d">Retirar </a>
                                <br>
                            </center>
                            <br>
                        </div>

                        <div id="tab_i" class="tab-pane">
                             <center>
                                <br>
                                <h2>Stakes Generados</h2>
                                <p> Lista de los "Stakes" generados por tus criptomonedas </p>
                                <div class="table-responsive table-bordered table-striped" style="margin: 20px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Txid</th>
                                            <th>Moneda</th>
                                            <th>BTC Estimado </th>
                                            <th>Fecha </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($generado as $gen)
                                        <tr class="success">
                                            <td>{{$gen['cantidad']}}</td>
                                            <td>{{$gen['txid']}}</td>
                                            <td>{{$gen['moneda']}}</td>
                                            <td>{{$gen['estimado']}} BTC</td>
                                            <td>{{$gen['fecha']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </center>
                           </div> 
                        <div id="tab_j" class="tab-pane">
                           <center>
                            <br>
                                <h2>Depositos y retiros</h2>
                                <h4>Depositos</h4>
                           
                                <div class="table-responsive table-bordered table-striped" style="margin: 20px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Txid</th>
                                            <th>Moneda</th>
                                            <th>Tipo </th>
                                            <th>Estado </th>
                                            <th>Fecha </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deposito as $dep)
                                        <tr class="success">
                                            <td>{{$dep['cantidad']}}</td>
                                            <td>{{$dep['txid']}}</td>
                                            <td>{{$dep['moneda']}}</td>
                                            <td>{{$dep['tipo']}}</td>
                                            <td>{{$dep['estado']}}</td>
                                            <td>{{$dep['fecha']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <h4>Retiros</h4>
                           
                                <div class="table-responsive table-bordered table-striped" style="margin: 20px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Txid</th>
                                            <th>Moneda</th>
                                            <th>Tipo </th>
                                            <th>Estado </th>
                                            <th>Dirección</th>
                                            <th>Fecha </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($retiro as $ret)
                                        <tr class="danger">
                                            <td>{{$ret['cantidad']}}</td>
                                            <td>{{$ret['txid']}}</td>
                                            <td>{{$ret['moneda']}}</td>
                                            <td>{{$ret['tipo']}}</td>
                                            <td>{{$ret['estado']}}</td>
                                            <td>{{$ret['address']}}</td>
                                            <td>{{$ret['fecha']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </center>
                        </div>
                        <div id="tab_k" class="tab-pane">
                             <center>
                                <br>
                                <h2>Ultimos stakes</h2>
                               <div class="table-responsive table-bordered table-striped" style="margin: 20px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Txid</th>
                                            <th>Moneda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stake as $stak)
                                        <tr class="success">
                                            <td>{{$stak['cantidad']}}</td>
                                            <td>{{$stak['txid']}}</td>
                                            <td>{{$stak['moneda']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </center>
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
