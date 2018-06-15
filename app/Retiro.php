<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
     protected $table = 'retiro';
    protected $fillable = [
        'cantidad', 'txid', 'user_id', 'usuario_id', 'estado','tipo', 'moneda_id', 'address'];
}
