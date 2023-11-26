<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $table = 'suscripcion';

    protected $fillable = [
        'plan', 'fecha_inicio', 'fecha_fin', 'monto', 'user_id', 'tarjeta_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tarjetas()
    {
        return $this->belongsTo(Tarjeta::class, 'tarjeta_id');
    }
}
