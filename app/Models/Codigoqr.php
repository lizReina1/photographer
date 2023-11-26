<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigoqr extends Model
{
    use HasFactory;

    protected $table = 'codigoqrs';

    protected $fillable = [
        'mensaje', 'evento_id',
    ];

    public function eventos()
    {
        return $this->belongsTo(Evento::class,'evento_id');
    }
}
