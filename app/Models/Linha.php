<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    use HasFactory;

    protected $fillable = [
        'cidade_origem',
        'cidade_destino'
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

    public function viagens() {
        return $this->hasMany(Viagem::class);
    }
}
