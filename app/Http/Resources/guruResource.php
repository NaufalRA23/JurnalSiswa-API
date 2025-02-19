<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class guruResource extends JsonResource
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
            'nama_guru' => $this->Guru->name,
            'email_guru' => $this->Guru->email,
            'foto_guru' => $this->Guru->foto,
        ];
    }
}
