<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentClassroom extends JsonResource
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
            'id_siswa' => $this->Siswa->id,
            'nama_siswa' => $this->Siswa->name,
            'email_siswa' => $this->Siswa->email,
            'foto_siswa' => $this->Siswa->foto,
            'nama_guru' => $this->Guru->name,
            'nama_kelas' => $this->kelas->nama_kelas,
        ];
    }
}
