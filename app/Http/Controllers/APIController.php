<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class APIController extends Controller
{
    public function userlogin(){
    	$id = DB::table('usuario')->where([
                ['name', '=', $_POST['name']],
                ['password', '=', $_POST['password']],
            ])->select('*')->get();
    	if(count($id) > 0){
    	    $user = DB::table('users')->where('id', $id[0]->id)->select('*')->get()[0];
            DB::table('usuario')
            ->where('id', $user->id)
            ->update(['code_notify' =>$_POST['code_notify']]);
    		return  response()->json([
			    'status' => '200',
			    'mensaje' => 'OK',
			    'name' => $_POST['name'],
			    'email' => $user->email,
			    'token' => $id[0]->token,
			]);
    	}
    	return  response()->json([
			    'status' => '401',
			    'mensaje' => 'Usuario o contraseña incorrectos'
			]);
    }
    public function usertransactions(){
    	$usuario = DB::table('usuario')->where('token', $_POST['token'])->select('*')->get()[0];
    	$transacciones = DB::table('generado')->where('usuario_id', $usuario->id)->select('*')->get();
    	$cantidad = '';
    	$estado = '';
    	$txid = '';
    	foreach ($transacciones as $trans) {
    		$moneda = DB::table('moneda')->where('id', $trans->moneda_id)->select('*')->get()[0];
    		$cantidad = $cantidad.$trans->cantidad.' '.$moneda->acro.'/';
    		$estado = $estado.$trans->estado.'/';
    		$txid = $txid.$trans->txid.'/';
    	}
    	$cantidad = substr($cantidad, 0, -1);
    	$estado = substr($estado, 0, -1);
    	$txid = substr($txid, 0, -1);
    	return response()->json([
    			'status' => '200',
    			'mensaje' => 'OK',
			    'cantidad' => $cantidad,
			    'estado' => $estado,
			    'txid' => $txid,
			]);
    }
    public function userbalance(){
    	$usuario = DB::table('usuario')->where('token', $_POST['token'])->select('*')->get()[0];
    	$balances = DB::table('balance')->where('usuario_id', $usuario->id)->select('*')->get();
    	$cantidad  ='';
    	foreach ($balances as $balance) {
    		$moneda = DB::table('moneda')->where('id', $balance->moneda_id)->select('*')->get()[0];
    		$cantidad = $cantidad.$balance->cantidad.' '.$moneda->acro.'/';
    	}
    	$cantidad = substr($cantidad, 0,-1);
    	return response()->json([
    			'status' => '200',
    			'cantidad' => $cantidad,
			]);
    }
    public function usernotify(){

    }
}
