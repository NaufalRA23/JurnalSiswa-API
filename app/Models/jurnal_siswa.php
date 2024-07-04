<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurnal_siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'murid_id',
        'judul',
        'isi',
        'foto',
    ];

    public function murid()
    {
        return $this->belongsTo(User::class);
    }
}
