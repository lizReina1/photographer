<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografia extends Model
{
    use HasFactory;

    protected $table = 'fotografia';

    protected $fillable = [
        'nombre', 'descripcion','url_imagen','precio','organizador_fotografo_id',
    ];

    public function eventos()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }


    public function organizador_fotografos()
    {
        return $this->belongsTo(organizador_fotografo::class, 'organizador_fotografo_id');
    }
}
