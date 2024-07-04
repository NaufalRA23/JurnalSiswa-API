<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas_siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'murid_id',
        'guru_id',
        'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function Siswa()
    {
        return $this->belongsTo(User::class,'murid_id');
    }

    public function Guru()
    {
        return $this->belongsTo(User::class,'guru_id');
    }
}
