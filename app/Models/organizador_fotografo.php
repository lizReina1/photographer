<?php

namespace App\Models;

use App\Http\Livewire\CatalogoFotograafo\CatalogoFotografo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organizador_fotografo extends Model
{
    use HasFactory;
    protected $table = 'organizador_fotografos';

    protected $fillable = [
        'organizador_id', 'fotografo_id','evento_id',
    ];

    public function organizadors()
    {
        return $this->belongsToMany(Organizador::class, 'organizador_fotografo','organizador_id','fotografo_id');
    }
    public function fotografos()
    {
        return $this->belongsToMany(Fotografo::class, 'organizador_fotografo', 'fotografo_id','organizador_id');
    }

    public function eventos()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function fotografia()
    {
        return $this->hasMany(fotografia::class, 'id');
    }

}
