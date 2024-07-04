<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Jurnal extends JsonResource
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
            'nama_user' => $this->murid->name,
            'judul' => $this->judul,
            'isi' => $this->isi,
            'foto' => $this->foto,
        ];
    }
}
