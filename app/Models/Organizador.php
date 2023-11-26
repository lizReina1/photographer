<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    use HasFactory;

    protected $table = 'organizadors';

    protected $fillable = [
        'nombreEmpresa', 'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'id');
    }

    public function fotografos()
    {
        return $this->belongsToMany(Fotografo::class, 'organizador_fotografo', 'organizador_id','fotografia_id');
    } 
}
