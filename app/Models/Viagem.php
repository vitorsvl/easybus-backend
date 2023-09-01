<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'horario_partida',
        'horario_chegada',
        'valor_passagem',
        'id_linha'
    ];

    public function linha() {
        return $this->belongsTo(Linha::class);
    }

    public function paradas() {
        return $this->hasMany(Parada::class);
    }
}


