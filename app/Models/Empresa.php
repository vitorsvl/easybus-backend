<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // necessário ?
    protected $fillable = [
        'nome',
        'email',
        'cnpj',
        'telefone',
        'endereco'
    ];

    public function funcionarios() {
        return $this->hasMany(Funcionario::class);
    }

    public function linhas() {
        return $this->hasMany(Linha::class);
    }

}
