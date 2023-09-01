<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    use HasFactory;

    protected $fillable = [
        'local',
        'id_viagem'
    ];

    public function viagem() {
        return $this->belongsTo('App\Models\Viagem');
    }
}
