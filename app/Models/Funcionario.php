<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Funcionario extends User
{
    use HasFactory;

    protected $fillable = [
        'cpf',
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }
}
