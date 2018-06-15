<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Deposito;
use App\Retiro;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->to('dashboard');
    }
    public function dashboard(){
        $id = Auth::User()->id;
        //INFORMACIÓN
        $usuario = DB::table('users')->where('id', $id)->select('*')->get()[0];
        $trans = DB::table('generado')->where('usuario_id', $id)->select('*')->get();
        $counttrans = count($trans);
        //BALANCES
        $balancearray = array();
        $balances = DB::table('balance')->where('usuario_id', $id)->select('*')->get();
        $i = 0;
        foreach ($balances as $balance) {
            $moneda = DB::table('moneda')->where('id', $balance->moneda_id)->select('*')->get()[0];
            $cantidad = $balance->cantidad.' '.$moneda->acro;
            $estimado = $balance->cantidad * $moneda->precio_btc;
            $estimado = substr($estimado, 0, 10);
            $balancearray[] = ['cantidad' => $cantidad, 'img' => 'images/moneda/'.$i.'.png', 'estimado' => $estimado];
            $i++; 
        }
        //GENERADO
        $generado = DB::table('generado')->where('usuario_id', $id)->select('*')->get();
        $generadoarray = array();
        foreach ($generado as $gen) {
            $mon = DB::table('moneda')->where('id', $gen->moneda_id)->select('*')->get()[0];
            $cantidad = $gen->cantidad.' '.$mon->acro;
            $estimadoa =  $gen->cantidad * $mon->precio_btc;
            $estimadoa = substr($estimadoa, 0, 10);
            $generadoarray[] = ['cantidad' => $cantidad, 'txid' => $gen->txid,'fecha' => $gen->created_at, 'moneda' => $mon->name, 'estimado' => $estimadoa];
        }
        //TRANSACCIONES
        $deposito = DB::table('deposito')->where('usuario_id', $id)->select('*')->get();
        $depositoarray = array();
        foreach ($deposito as $dep) {
             $mon = DB::table('moneda')->where('id', $dep->moneda_id)->select('*')->get()[0];
             if($dep->tipo == 'Criptomoneda'){
                $cantidad = $dep->cantidad.' '.$mon->acro;   
             }else{
                $cantidad = $dep->cantidad.' Bs';
             }
             
             $depositoarray[] = ['cantidad' => $cantidad, 'txid' => $dep->txid,'fecha' => $dep->created_at, 'moneda' => $mon->name, 'estado' => $dep->estado, 'tipo' => $dep->tipo];
        }
        $retiro = DB::table('retiro')->where('usuario_id', $id)->select('*')->get();
        $retiroarray = array();
        foreach ($retiro as $ret) {
             $mon = DB::table('moneda')->where('id', $ret->moneda_id)->select('*')->get()[0];
             $cantidad = $ret->cantidad.' '.$mon->acro;
             $tx = $ret->txid;
             $tx = substr($tx, 0, 7);
             $tx = $tx.'...';
             $retiroarray[] = ['cantidad' => $cantidad, 'txid' => $tx,'fecha' => $ret->created_at, 'moneda' => $mon->name, 'estado' => $ret->estado, 'tipo'=>$ret->tipo, 'address' => $ret->address];
        }
        //STAKES
        $pools = DB::table('pool')->select('*')->get();
        $stakesarray = array();
        foreach ($pools as $pool) {
           $mon = DB::table('moneda')->where('id', $pool->moneda_id)->select('*')->get()[0];
           $cantidad = $pool->ultimo_generado.' '.$mon->acro;
           $stakesarray[] = ['cantidad' => $cantidad, 'txid' => $pool->ultimo_txid, 'moneda' => $mon->name];
        }
        //NOTIFICACIONES
        $notificacion = DB::table('notificacion')->where('usuario_id', $id)->select('*')->get()[0];
        $b = false;
        if($notificacion->nuevo == 1){
            $b = true;
            DB::table('notificacion')
            ->where('usuario_id', $id)
            ->update(['nuevo' =>0]);
        }
        return view('usuario/dashboard', ['infouser' => $usuario, 'infogenerado' => $counttrans, 'balance' => $balancearray, 'generado' => $generadoarray, 'deposito' => $depositoarray, 'retiro' => $retiroarray, 'stake' => $stakesarray, 'b' => $b,'notificacion' => $notificacion]);
    }
    public function deposit(){
        return view('usuario/deposit');
    }
    public function withdraw(){
        $id = Auth::User()->id;
        $balance = DB::table('balance')->where('usuario_id', $id)->select('cantidad')->get();
        return view('usuario/withdraw', ['balance' => $balance]);
    }


    public function deposittigomoney(){
        $id = Auth::User()->id;
        Deposito::create([
            'cantidad' => $_POST['cantidad'],
            'txid' => $_POST['telefono'],
            'user_id' => $id,
            'usuario_id' => $id,
            'estado' => 'Esperando deposito',
            'tipo' => 'Tigo Money',
            'moneda_id' => $_POST['moneda'],
        ]);
        return redirect()->to('dashboard');
    }
    public function depositcuenta(){
        $id = Auth::User()->id;
        Deposito::create([
            'cantidad' => $_POST['cantidad'],
            'txid' => str_random(64),
            'user_id' => $id,
            'usuario_id' => $id,
            'estado' => 'Esperando deposito',
            'tipo' => 'Cuenta Bancaria',
            'moneda_id' => $_POST['moneda'],
        ]);
        return redirect()->to('dashboard');
    }
    public function depositbtc(){
        $id = Auth::User()->id;
        Deposito::create([
            'cantidad' => $_POST['cantidad'],
            'txid' => str_random(64),
            'user_id' => $id,
            'usuario_id' => $id,
            'estado' => 'Esperando deposito',
            'tipo' => 'Cryptomoneda',
            'moneda_id' => $_POST['moneda'],
        ]);
        return redirect()->to('dashboard');
    }

    public function retirar(){
        $id = Auth::User()->id;
        $balance = DB::table('balance')->where('usuario_id', $id)->select('cantidad')->get();
        $fee = 0;
        switch ($_POST['moneda']) {
            case '1':
                $fee = 0.02000000;
                break;
            case '2':
                $fee = 0.03000000;
            break;
            case '3':
                $fee = 50.00000000;
            break;
            case '4':
                $fee = 350.00000000;
            break;
            default:
                # code...
                break;
        }
        if($balance[$_POST['moneda']-1]->cantidad >= $_POST['cantidad']){
            $nuevobalance = $balance[$_POST['moneda'] -1]->cantidad - $_POST['cantidad'];
          DB::table('balance')
            ->where([
                ['usuario_id', '=', $id],
                ['moneda_id', '=', $_POST['moneda']],
            ])
            ->update(['cantidad' =>$nuevobalance]);
            $cantidadnueva = $_POST['cantidad'] - $fee;
            $cantidadnueva = substr($cantidadnueva, 0, 10);
            Retiro::create([
                'cantidad' => $cantidadnueva,
                'txid' => 'Procesando',
                'user_id' => $id,
                'usuario_id' => $id,
                'estado' => 'En cola',
                'tipo' => 'Criptomoneda',
                'moneda_id' => $_POST['moneda'],
                'address' => $_POST['direccion'],

            ]);

        }
        return redirect()->to('dashboard');
    }
}
