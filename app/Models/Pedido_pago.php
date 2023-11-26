<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_pago extends Model
{
    use HasFactory;

    protected $table = 'pedido_pago';

    protected $fillable = [
        'fecha_pago', 'monto', 'estado', 'carrito_id', 'tarjeta_id',
    ];

    public function carritos()
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    public function tarjetas()
    {
        return $this->belongsTo(Tarjeta::class, 'tarjeta_id');
    }

}
