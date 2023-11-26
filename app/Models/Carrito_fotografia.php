<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito_fotografia extends Model
{
    use HasFactory;

    protected $table = 'carrito_fotografia';

    protected $fillable = [
        'fotografia_id', 'carrito_id',
    ];

    public function fotografias()
    {
        return $this->belongsToMany(Fotografia::class, 'fotografia_id');
    }
    public function carrito()
    {
        return $this->belongsToMany(Carrito::class, 'carrito_id');
    }
}
