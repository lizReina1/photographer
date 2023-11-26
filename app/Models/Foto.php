<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';

    protected $fillable = [
        'path', 'perfil_id',
    ];

    public function perfils()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }
}
