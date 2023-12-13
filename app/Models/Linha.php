<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    use HasFactory;

    protected $fillable = [
        'cidade_origem',
        'cidade_destino',
        'empresa_id'
    ];

    public function empresa() {
        return $this->belongsTo('App\Models\Empresa');
    }

    public function viagens() {
        return $this->hasMany('App\Models\Viagem');
    }

    public function passageiros() {
        return $this->belongsToMany('App\Models\Passageiro', 'passageiro_linha', 'linha_id', 'passageiro_id');
    }
}
