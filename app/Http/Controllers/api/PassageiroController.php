<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Passageiro;
use Illuminate\Http\Request;

class PassageiroController extends Controller
{
    public function getAll()
    {
        return Passageiro::all();
    }

    public function create()
    {
        //
    }

    public function getOne(string $id)
    {
        return Passageiro::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
