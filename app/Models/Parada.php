<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    use HasFactory;

    protected $fillable = [
        'local'
    ];

    public function viagem() {
        return $this->belongsTo(Viagem::class);
    }
}
