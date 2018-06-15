<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class mainController extends Controller
{
    public function pools(){
    	$pools = DB::table('pool')->select('*')->get();
    	$resultado = array();
    	$i = 0;
    	foreach ($pools as $pool) {
    		$moneda = DB::table('moneda')->where('id', $pool->moneda_id)->select('*')->get()[0];
    		$item = ['estado' => $pool->estado, 'maduracion' => $moneda->maduracion, 'retorno' => $moneda->retorno_anual,'acro' => $moneda->acro, 'nombre' => $moneda->name, 'image' => 'images/'.$i.'.png'];
    		$resultado[] = $item;
    		$i++;
    	}
    	return view('pools', ['resultado' => $resultado]);
    }
    public function terminos(){

    }
}
