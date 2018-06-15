<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
     protected $table = 'balance';
    protected $fillable = [
        'cantidad', 'moneda_id', 'user_id', 'usuario_id'];
}
