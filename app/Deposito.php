<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
     protected $table = 'deposito';
    protected $fillable = [
        'cantidad', 'txid', 'user_id', 'usuario_id', 'estado','tipo', 'moneda_id'];
}
