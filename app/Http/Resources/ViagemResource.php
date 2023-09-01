<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ViagemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'horario_partida' => $this->horario_partida,
            'horario_chegada' => $this->horario_chegada,
            'valor_passagem' => $this->valor_passagem,
            'paradas' => $this->paradas->pluck('local')
        ];
    }
}
