<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
    ];

    public function kelasGurus()
    {
        return $this->hasMany(class_guru::class);
    }

    public function kelasSiswa()
    {
        return $this->hasMany(kelas_siswa::class);
    }
}
