<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LinhaResource extends JsonResource
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
            'cidade_origem' => $this->cidade_origem,
            'cidade_destino' => $this->cidade_destino,
            'viagens' => ViagemResource::collection($this->whenLoaded('viagens'))
        ];
    }
}
