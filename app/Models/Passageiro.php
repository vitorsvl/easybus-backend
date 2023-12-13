<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Passageiro extends User
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function linhasFavoritas() {
        return $this->belongsToMany('App\Models\Linha', 'passageiro_linha', 'passageiro_id', 'linha_id');
    }

}
