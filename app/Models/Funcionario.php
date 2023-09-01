<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Funcionario extends User
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'empresa_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }

}
