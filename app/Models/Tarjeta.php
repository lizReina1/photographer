<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;

    protected $table = 'tarjetas';

    protected $fillable = [
        'cvv', 'fecha', 'numero',
    ];

    public function suscripcions()
    {
        return $this->hasMany(Suscripcion::class, 'id');
    }

    public function pedido_pagos()
    {
        return $this->hasMany(Pedido_pago::class, 'id');
    }

}
