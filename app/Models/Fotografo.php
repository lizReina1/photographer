<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografo extends Model
{
    use HasFactory;

    protected $table = 'fotografos';

    protected $fillable = [
        'nombre','especialidad', 'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   
    public function Organizadors()
    {
        return $this->belongsToMany(Organizador::class, 'organizador_fotografo', 'organizador_id','fotografia_id');
    } 

  
}
